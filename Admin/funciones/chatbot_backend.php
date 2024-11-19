<?php
session_start();
require 'conecta.php';
$con = conecta();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$user_message = $data['message'] ?? '';

// Verificar si la solicitud es para un dato curioso
if ($user_message === "dato_curioso") {
    // Seleccionar un dato curioso aleatorio
    $dato_curioso_query = "SELECT contenido FROM datos_curiosos ORDER BY RAND() LIMIT 1";
    $dato_curioso_result = $con->query($dato_curioso_query);
    
    if ($dato_curioso_result && $dato_curioso_result->num_rows > 0) {
        $dato_curioso = $dato_curioso_result->fetch_assoc();
        echo json_encode(['reply' => $dato_curioso['contenido']]);
    } else {
        echo json_encode(['reply' => "Lo siento, no hay datos curiosos disponibles en este momento."]);
    }
    exit;
}

// Función para encontrar la respuesta más cercana a la pregunta
function obtenerRespuestaCercana($mensajeUsuario, $conexion) {
    $query = "SELECT pregunta, respuesta FROM respuestas_chatbot";
    $result = $conexion->query($query);

    if (!$result) {
        return "Error en la consulta: " . $conexion->error;
    }

    $mejor_respuesta = "Lo siento, no entendí tu pregunta. ¿Puedes intentarlo de nuevo?";
    $mayor_similitud = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pregunta = $row['pregunta'];
            $respuesta = $row['respuesta'];

            similar_text($mensajeUsuario, $pregunta, $similitud);

            if ($similitud > $mayor_similitud) {
                $mayor_similitud = $similitud;
                $mejor_respuesta = $respuesta;
            }
        }
    }

    if ($mayor_similitud < 50) {
        $mejor_respuesta = "Lo siento, no entendí tu pregunta. ¿Puedes intentarlo de nuevo?";
    }

    return $mejor_respuesta;
}

// Obtener respuesta regular si no es solicitud de dato curioso
$respuesta = obtenerRespuestaCercana($user_message, $con);
echo json_encode(['reply' => $respuesta]);

$con->close();
?>
