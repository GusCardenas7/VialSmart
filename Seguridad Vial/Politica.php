<?php
    require "../Admin/funciones/comprobarSesion.php";
   
?>

<html>
<head>
    <title>Política de privacidad</title>
    <link rel="stylesheet" href="../CSS/politica.css">
    <script src="../JavaScript/lecciones_typewritter.js"></script>

</head>
<body> 
    <?php 
        include '../funciones/menu.php';  

        // Parte dónde se revisa si ya se ha desbloqueado antes o no
        require "../Admin/funciones/conecta.php";   
        $con = conecta();
        $id_usuario = $_SESSION['idU'];
        
       //checar el id de lecciones y modulos
       $sql = "SELECT * FROM modulos WHERE nombre='Introduccion' AND usuarios_id = $id_usuario"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_modulos = $row["id"];
       } 

       $sql = "SELECT * FROM lecciones WHERE nombre='Que es la seguridad vial' AND desbloqueado = 1 AND modulos_id = $id_modulos"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_lecciones = $row["id"];
       } 
    ?>

    <br><br><br><br><br>
    <div class="content">
        <div class="header-container">
                    <img src="../imagenes/politica.png" class="header-image" alt="Imagen Agitada">
                    <div class="moduleTitle scale-up-top">Política de privacidad</div>
                </div>
                <div id="lessons" class="lessons scale-up-bottom">
                    <p>En VialSmart valoramos tu privacidad. A continuación, te explicamos cómo protegemos y utilizamos tu información personal:</p><br><br>

                    <p class="term-title">1. Información Recopilada</p>
                    <p>° Datos Personales: Solicitamos información como el nombre y la edad del usuario para personalizar la experiencia educativa.</p>
                    <p>° Datos de Uso: Registramos el progreso de aprendizaje para mejorar la plataforma y adaptar el contenido.</p><br><br>

                    <p class="term-title">2. Uso de la Información</p>
                    <p>° Personalizamos el contenido educativo y monitorizamos el progreso.</p>
                    <p>° Enviamos notificaciones y recordatorios para optimizar la experiencia de aprendizaje.</p><br><br>

                    <p class="term-title">3. Protección de los Datos</p>
                    <p>Implementamos medidas de seguridad para proteger tus datos contra accesos no autorizados.</p><br><br>

                    <p class="term-title">4. Compartición con Terceros </p>
                    <p>No compartimos tu información con terceros, excepto cuando sea necesario por ley o para proteger la plataforma.</p><br><br>

                    <p class="term-title">5. Cookies</p>
                    <p>Utilizamos cookies para mejorar la navegación y recordar preferencias. Puedes desactivarlas en tu navegador.</p><br><br>

                    <p class="term-title">6. Derechos del Usuario</p>
                    <p>Puedes acceder, corregir o eliminar tu información, así como retirar tu consentimiento en cualquier momento.</p><br><br>

                    <p class="term-title">7. Privacidad de Menores</p>
                    <p>Recomendamos la supervisión de un adulto durante el uso de la plataforma.</p><br><br>

                    <p class="term-title">8. Cambios en la Política</p>
                    <p>Podremos actualizar esta política y se te notificará de cualquier cambio.</p><br><br>



                </div>        
    </div> 

    <?php    
        // Verifico si existe ya un registro con esos datos
        $sql = "SELECT * FROM videos WHERE nombre='Que es la seguridad vial' AND desbloqueado = 1 AND lecciones_id = $id_lecciones AND lecciones_modulos_id = $id_modulos";
        $res = $con->query($sql);
        $fila= mysqli_num_rows($res);
        
        if($fila >= 1){
          echo "<script> document.getElementById('FlechaDesbloqueada').style.display = 'block'; </script>";
          echo "<script> document.getElementById('boton').style.display = 'none'; </script>";
        }
  ?>

    <footer>
        <div class="links">
            <a href="Terminos.php">Términos y condiciones</a>
            <a href="Politica.php">Política de privacidad</a>
            <a href="Contacto_formulario.php">Contáctanos</a>
        </div>
        <span class="copyright">&copy; VialSmart 2024</span>
    </footer>
</body>
</html>

<script>

function desbloquear(){
   //aqui se tiene que evaluar que si ya hay un modulo introduccion con el id del usuario entonces que la flecha aparezca por sí sola y que no haga el insert.
   document.getElementById("FlechaDesbloqueada").style.display = "block";
   
<?php if($fila == 0){ ?>
           // --- Llamada AJAX para actualizar la base de datos ---
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "../Admin/funciones/registrar_lecciones.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
              if (xhr.status === 200) {
                console.log("Respuesta del servidor: ", xhr.responseText); // Verifica la respuesta del servidor
              } else {
                console.error("Error: ", xhr.statusText); // Si hay un error, lo mostramos
              }
            }
          };
          console.log("Enviando petición AJAX");
          xhr.send("id_lecciones=" + <?php echo $id_lecciones; ?> + "&id_modulos=" + <?php echo $id_modulos; ?> + "&nombre_leccion='Que es la seguridad vial'");
          
<?php } ?>
   
}

</script>
