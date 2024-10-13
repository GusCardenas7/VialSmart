<?php
    require "../Admin/funciones/comprobarSesion.php";
?>

<html>
<head>
    <title>Logros</title>
    <link rel="stylesheet" href="../CSS/logros.css">
    <script src="../JavaScript/logros.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var video = document.getElementById('background-video');
    
    // Establece la velocidad de reproducción. 0.5 es la mitad de la velocidad normal.
    video.playbackRate = 0.5;
});
    </script>
</head>
<body> 
    <?php 
        include '../funciones/menu.php'; 
    ?>
    <br><br><br><br><br><br><br>
    <video autoplay muted loop id="background-video">
    <source src="../imagenes/warning.mp4" type="video/mp4">
    Tu navegador no soporta la etiqueta de video.
</video>
    <div class="module content">
        <div id="lessons" class="lessons">
            <div id="lesson1" class="lesson blur-in-expand" onclick="goToPage('ranking.php')">
                <img src="../imagenes/ranking.png" alt="Ranking">
                <div class="lesson-title">Ver ranking general</div>
            </div>
            <div id="lesson2" class="lesson blur-in-expand" onclick="goToPage('logrosConseguidos.php')">
                <img src="../imagenes/logros.png" alt="Logros">
                <div class="lesson-title">Ver logros conseguidos</div>
            </div>
        </div>
    </div>
    
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