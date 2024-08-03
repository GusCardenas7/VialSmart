<html>
<head>
    <title>Videos</title>
    <link rel="stylesheet" href="../CSS/videos.css">
</head>
<body> 
    <?php 
        include '../funciones/menu.php'; 
    ?>
    <br><br><br><br>
    <nav>
        <ul>
            <li><a href="#" class="active">Lección 1</a></li>
            <li><a href="#">Lección 2</a></li>
            <li><a href="#">Lección 3</a></li>
            <li><a href="#">Lección 4</a></li>
            <li><a href="#">Lección 5</a></li>
            <li><a href="#">Lección 6</a></li>
            <li><a href="#">Lección 7</a></li>
            <li><a href="#">Lección 8</a></li>
        </ul>
    </nav>
    <br><br>
    <div class="video-container">
        <div id="video-title" class="video-title">Video 1.1: ¿Qué es la seguridad vial?</div>
        <video id="main-video" controls poster="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg">
            <source src="../Videos/1.1 Que es la seguridad vial.mp4" type="video/mp4">
            Tu navegador no soporta la reproducción de videos.
        </video>
    </div>

    <div class="thumbnails">
        <div class="thumbnail" onclick="changeVideo('Video 1.2: Usuarios de la vía', '../Videos/1.2 Usuarios de la via.mp4', '../imagenes/miniaturas/1.2 Usuarios de la via.jpg')">
            <img src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Miniatura Video 1">
            <div id="thumb-vid-title" class="thumb-vid-title">Video 1.2: Usuarios de la vía</div>
        </div>
        
        <div class="thumbnail" onclick="changeVideo('video2.mp4', '../imagenes/miniaturas/en_proceso.jpg')">
            <img src="../imagenes/miniaturas/en_proceso.jpg" alt="Miniatura Video 2">
            <div id="thumb-vid-title" class="thumb-vid-title">Video 1.3: La vía y sus partes</div>
        </div>
        <div class="thumbnail" onclick="changeVideo('video3.mp4', '../imagenes/miniaturas/en_proceso.jpg')">
            <img src="../imagenes/miniaturas/en_proceso.jpg" alt="Miniatura Video 3">
            <div id="thumb-vid-title" class="thumb-vid-title">Video 1.4: Texto de ejemplo</div>
        </div>
    </div>

    <script>
        function changeVideo(videoTitle, videoSrc, posterSrc) {
            const video = document.getElementById('main-video');
            const title = document.getElementById('video-title');
            title.textContent = videoTitle;
            video.src = videoSrc;
            video.poster = posterSrc;
            video.load();
        }
    </script>
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