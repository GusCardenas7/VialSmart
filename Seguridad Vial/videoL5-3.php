<?php
    require "../Admin/funciones/comprobarSesion.php"; 
?>

<html>
<head>
    <title>Video 5.3</title>
    <link rel="stylesheet" href="../CSS/leccionesVideos.css">
    <script src="../JavaScript/videos.js"></script>
</head>
<body> 
    <?php 
        include '../funciones/menu_sec.php'; 
      
         // Parte dónde se revisa si ya se ha desbloqueado antes o no
        require "../Admin/funciones/conecta.php";   
        $con = conecta();
        $id_usuario = $_SESSION['idU'];
        
       //checar el id de lecciones y modulos
       $sql = "SELECT * FROM modulos WHERE nombre='Situaciones de emergencia' AND usuarios_id = $id_usuario"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_modulos = $row["id"];
       } 

       $sql = "SELECT * FROM lecciones WHERE nombre='Prevencion y seguridad en caso de desastres' AND desbloqueado = 1 AND modulos_id = $id_modulos"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_lecciones = $row["id"];
       } 
    ?>
    <br><br><br><br><br>
    <div class="content">
        <div class="moduleTitle scale-up-top">Lección 5.3: Prevención y seguridad en caso de emergencias</div><br>
        <div class="video-container scale-up-bottom">
            <div id="central-video-title" class="video-title">Video 5.3: Prevencion y seguridad en caso de emergencias</div>
            <video id="central-video" controls poster="../imagenes/miniaturas/5.3 Prevencion y seguridad en caso de emergencias.jpg">
                <source id="central-video-source" src="../Videos/5.3 Prevencion y seguridad en caso de emergencias.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
        <div class="arrowsContainer">
            <div><a href="leccion5-3.php"><img src="../imagenes/regresar.png" width="90px" height="90px"></a></div>
            <div id="FlechaDesbloqueada"><a href="Juego15.php"><img src="../imagenes/avanzar.png" width="90px" height="90px"></a></div>
        </div>
    </div>

     <?php 
       // Verifico si existe ya un registro con esos datos
        $sql = "SELECT * FROM juegos WHERE nombre='Prevencion y seguridad en caso de desastres' AND tipo='quiz' AND desbloqueado = 0 AND lecciones_id = $id_lecciones AND lecciones_modulos_id = $id_modulos";
        $res = $con->query($sql);
        $fila= mysqli_num_rows($res);
        
        if($fila >= 1){
          echo "<script> document.getElementById('FlechaDesbloqueada').style.display = 'block'; </script>";
        }
    ?>

    <footer>
        <div class="links">
            <a href="">Términos y condiciones</a>
            <a href="">Política de privacidad</a>
            <a href="../contacto_formulario.php">Contáctanos</a>
        </div>
        <span class="copyright">&copy; VialSmart 2024</span>
    </footer>
</body>
</html>

<script>
    // Obtenemos el elemento video
    var video = document.getElementById('central-video');

    // Variable bandera para asegurarnos que solo se dispare una vez
    var bandera = false;

    // Escuchar el evento "timeupdate"
    video.addEventListener('timeupdate', function() {
    var tiempoActual = video.currentTime; // Tiempo actual del vídeo en segundos

    // Verificamos si el vídeo ha llegado a los 30 segundos
        if (tiempoActual >= 137 && !bandera) {
            // Acción a realizar cuando se alcanza el tiempo especificado
            console.log('Se ha alcanzado el minuto 0:30');
            document.getElementById("FlechaDesbloqueada").style.display = "block";
      <?php  
             if($fila == 0){ 
                 $sql = "INSERT INTO juegos (nombre, tipo, desbloqueado, puntaje, lecciones_id, lecciones_modulos_id) VALUES ('Prevencion y seguridad en caso de desastres','quiz',0,0,$id_lecciones ,$id_modulos);";
                 $res = $con->query($sql);
             }
      ?>   
            // Cambiamos la variable bandera a true para que solo se active una vez
            bandera = true;
        }
    });
</script>