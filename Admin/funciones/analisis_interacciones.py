# -*- coding: utf-8 -*-
import mysql.connector
import pandas as pd
import matplotlib.pyplot as plt
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
from email import encoders
import os

# Configuración de la base de datos
db_config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'vialsmart',

}

# Conexión a la base de datos y carga de datos
def cargar_datos():
    conexion = mysql.connector.connect(**db_config)
    
    # Preguntas más frecuentes
    query_frecuencia = """
        SELECT pregunta, COUNT(*) as frecuencia
        FROM interacciones
        WHERE DATE(timestamp) = CURDATE()
        GROUP BY pregunta
        ORDER BY frecuencia DESC
        LIMIT 5
    """
    df_frecuencia = pd.read_sql(query_frecuencia, conexion)
    
    # Preguntas por hora
    query_por_hora = """
        SELECT HOUR(timestamp) as hora, COUNT(*) as total
        FROM interacciones
        WHERE DATE(timestamp) = CURDATE()
        GROUP BY HOUR(timestamp)
        ORDER BY hora
    """
    df_por_hora = pd.read_sql(query_por_hora, conexion)

    conexion.close()
    return df_frecuencia, df_por_hora

# Generación de gráficos
def generar_graficos(df_frecuencia, df_por_hora):
    # Gráfico de preguntas más frecuentes
    plt.figure(figsize=(10, 6))
    df_frecuencia.plot(x='pregunta', y='frecuencia', kind='bar', color='skyblue')
    plt.title('Preguntas mas frecuentes del dia')
    plt.xlabel('Pregunta')
    plt.ylabel('Frecuencia')
    plt.xticks(rotation=45, ha="right")
    plt.tight_layout()
    plt.savefig('preguntas_frecuentes.png')
    plt.close()

    # Gráfico de distribución de preguntas por hora
    plt.figure(figsize=(10, 6))
    df_por_hora.plot(x='hora', y='total', kind='bar', color='salmon')
    plt.title('Distribucion de preguntas por hora')
    plt.xlabel('Hora')
    plt.ylabel('Cantidad')
    plt.tight_layout()
    plt.savefig('preguntas_por_hora.png')
    plt.close()

# Envío del correo electrónico
def enviar_correo():
    remitente = "dianaigonzalez.o@gmail.com"
    destinatario = "vialsmart79@gmail.com"
    asunto = "Reporte Diario de Interacciones del Chatbot"
    mensaje = MIMEMultipart()
    mensaje['From'] = remitente
    mensaje['To'] = destinatario
    mensaje['Subject'] = asunto
    cuerpo = """
    Adjuntamos los graficos del analisis diario:
    - Preguntas mas frecuentes.
    - Distribucion de preguntas por hora.
    """
    mensaje.attach(MIMEText(cuerpo, 'plain'))

    # Adjuntar gráficos
    for archivo in ['preguntas_frecuentes.png', 'preguntas_por_hora.png']:
        with open(archivo, 'rb') as adjunto:
            mime_base = MIMEBase('application', 'octet-stream')
            mime_base.set_payload(adjunto.read())
            encoders.encode_base64(mime_base)
            mime_base.add_header('Content-Disposition', f'attachment; filename={os.path.basename(archivo)}')
            mensaje.attach(mime_base)

    # Configuración del servidor de correo
    servidor = smtplib.SMTP('smtp.gmail.com', 587)
    servidor.starttls()
    servidor.login(remitente, 'uybv dbnc zcqe uuwy')  # Cambia por tu contraseña de aplicación
    texto = mensaje.as_string()
    servidor.sendmail(remitente, destinatario, texto)
    servidor.quit()

# Ejecución del análisis y envío de correo
if __name__ == "__main__":
    df_frecuencia, df_por_hora = cargar_datos()
    if not df_frecuencia.empty:
        generar_graficos(df_frecuencia, df_por_hora)
        enviar_correo()
        print("Analisis completado y correo enviado.")
    else:
        print("No hay interacciones registradas hoy.")
