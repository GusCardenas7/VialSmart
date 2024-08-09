<html>
<head>
    <title>Logros</title>
    <link rel="stylesheet" href="CSS/logros.css">
</head>
<body> 
    <?php 
        include 'funciones/menu_sec.php'; 
    ?>
    <br><br><br><br>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var video = document.getElementById('background-video');
    
    // Establece la velocidad de reproducción. 0.5 es la mitad de la velocidad normal.
    video.playbackRate = 0.5;
});
    </script>

    <video autoplay muted loop id="background-video">
        <source src="imagenes/warning.mp4" type="video/mp4">
        Tu navegador no soporta la etiqueta de video.
    </video>

    <div class="container">
        <div class="card">
            <a href="#" target="_blank" class="link">
                <img src="imagenes/ranking.png" alt="Estadísticas" class="image">
            </a>
            <p class="text">Ver ranking general</p>
        </div>
        
        <div class="card">
            <a href="#" target="_blank" class="link">
            <img src="imagenes/logros.png" alt="Objetivo" class="image">
            </a>
            <p class="text">Ver logros conseguidos</p>
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