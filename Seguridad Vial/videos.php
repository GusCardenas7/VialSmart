<?php
    require "../Admin/funciones/comprobarSesion.php";
?>

<html>
<head>
    <title>Videos</title>
    <link rel="stylesheet" href="../CSS/videos.css">
    <script src="../JavaScript/videos.js"></script>
</head>
<body> 
    <?php 
        include '../funciones/menu.php'; 
    ?>
    <br><br><br><br>
    <nav>
        <ul>
            <li><a id="a-module1" onclick="hideModules(1)" class="active">Módulo 1</a></li>
            <li><a id="a-module2" onclick="hideModules(2)">Módulo 2</a></li>
            <li><a id="a-module3" onclick="hideModules(3)">Módulo 3</a></li>
            <li><a id="a-module4" onclick="hideModules(4)">Módulo 4</a></li>
            <li><a id="a-module5" onclick="hideModules(5)">Módulo 5</a></li>
            <li><a id="a-module6" onclick="hideModules(6)">Módulo 6</a></li>
            <li><a id="a-module7" onclick="hideModules(7)">Módulo 7</a></li>
            <li><a id="a-module8" onclick="hideModules(8)">Módulo 8</a></li>
        </ul>
    </nav><br>
    <div id="module1" class="module content">
        <div class="moduleTitle">Módulo 1: Introducción a la Seguridad Vial</div><br>
        <div class="video-container">
            <div id="central-video-title" class="video-title">Video 1.1: ¿Qué es la seguridad vial?</div>
            <video id="central-video" controls poster="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg">
                <source id="central-video-source" src="../Videos/1.1 Que es la seguridad vial.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail1" class="thumbnail" onclick="swapVideos(1)">
                <img id="thumbnail-image1" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Miniatura Video 1">
                <div id="thumb-vid-title1" class="thumb-vid-title">Video 1.2: Los usuarios de la vía</div>
            </div>
            <div id="thumbnail2" class="thumbnail" onclick="swapVideos(2)">
                <img id="thumbnail-image2" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Miniatura Video 2">
                <div id="thumb-vid-title2" class="thumb-vid-title">Video 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>

    <div id="module2" class="module content" hidden>
        <div class="moduleTitle">Módulo 2: Señales de Tránsito</div><br>
        <div class="video-container">
            <div id="central-video-title" class="video-title">Video 2.1: Tipos de señales de tránsito</div>
            <video id="central-video" controls poster="../imagenes/miniaturas/2.1 Tipos de señales de transito.jpg">
                <source id="central-video-source" src="../Videos/2.1 Tipos de señales de transito.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail3" class="thumbnail" onclick="swapVideos(1)">
                <img id="thumbnail-image3" src="../imagenes/miniaturas/2.2 Señales de transito mas comunes.jpg" alt="Miniatura Video 1">
                <div id="thumb-vid-title3" class="thumb-vid-title">Video 2.2: Señales de tránsito más comunes</div>
            </div>
            <div id="thumbnail4" class="thumbnail" onclick="swapVideos(2)">
                <img id="thumbnail-image4" src="../imagenes/miniaturas/2.3 Señales especiales para niños.jpg" alt="Miniatura Video 2">
                <div id="thumb-vid-title4" class="thumb-vid-title">Video 2.3: Señales especiales para niños</div>
            </div>
        </div>
    </div>

    <div id="module3" class="module content" hidden>
        <div class="moduleTitle">Módulo 3: Reglas Básicas de Seguridad Vial</div><br>
        <div class="video-container">
            <div id="central-video-title" class="video-title">Video 3.1: Cruce seguro en las calles</div>
            <video id="central-video" controls poster="../imagenes/miniaturas/3.1 Cruce seguro de la calle.jpg">
                <source id="central-video-source" src="../Videos/3.1 Cruce seguro de la calle.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail5" class="thumbnail" onclick="swapVideos(1)">
                <img id="thumbnail-image5" src="../imagenes/miniaturas/3.2 Comportamiento peatonal seguro.jpg" alt="Miniatura Video 1">
                <div id="thumb-vid-title5" class="thumb-vid-title">Video 3.2: Comportamiento peatonal seguro</div>
            </div>
            <div id="thumbnail6" class="thumbnail" onclick="swapVideos(2)">
                <img id="thumbnail-image6" src="../imagenes/miniaturas/3.3 Uso seguro de la bicicleta.jpg" alt="Miniatura Video 2">
                <div id="thumb-vid-title6" class="thumb-vid-title">Video 3.3: Uso seguro de la bicicleta</div>
            </div>
        </div>
    </div>

    <div id="module4" class="module content" hidden>
        <div class="moduleTitle">Módulo 4: Seguridad en el Vehículo</div><br>
        <div class="video-container">
            <div id="central-video-title" class="video-title">Video 4.1: Uso del cinturón de seguridad</div>
            <video id="central-video" controls poster="../imagenes/miniaturas/4.1 Uso del cinturón de seguridad.jpg">
                <source id="central-video-source" src="../Videos/4.1 Uso del cinturón de seguridad.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail7" class="thumbnail" onclick="swapVideos(1)">
                <img id="thumbnail-image7" src="../imagenes/miniaturas/4.2 Comportamiento seguro en el automovil.jpg" alt="Miniatura Video 1">
                <div id="thumb-vid-title7" class="thumb-vid-title">Video 4.2: Comportamiento seguro en el automóvil</div>
            </div>
            <div id="thumbnail8" class="thumbnail" onclick="swapVideos(2)">
                <img id="thumbnail-image8" src="../imagenes/miniaturas/4.3 Transporte escolar.jpg" alt="Miniatura Video 2">
                <div id="thumb-vid-title8" class="thumb-vid-title">Video 4.3: Transporte escolar</div>
            </div>
        </div>
    </div>

    <div id="module5" class="module content" hidden>
        <div class="moduleTitle">Módulo 5: Situaciones de Emergencia</div><br>
        <div class="video-container">
            <div id="central-video-title" class="video-title">Video 5.1: ¿Qué hacer en caso de accidente?</div>
            <video id="central-video" controls poster="../imagenes/miniaturas/5.1 Que hacer en caso de un accidente.jpg">
                <source id="central-video-source" src="../Videos/5.1 Que hacer en caso de un accidente.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail9" class="thumbnail" onclick="swapVideos(1)">
                <img id="thumbnail-image9" src="../imagenes/miniaturas/5.2 Primeros auxilios basicos.jpg" alt="Miniatura Video 1">
                <div id="thumb-vid-title9" class="thumb-vid-title">Video 5.2: Primeros auxilios básicos</div>
            </div>
            <div id="thumbnail6" class="thumbnail" onclick="swapVideos(2)">
                <img id="thumbnail-image10" src="../imagenes/miniaturas/5.3 Prevencion y seguridad en caso de emergencias.jpg" alt="Miniatura Video 2">
                <div id="thumb-vid-title10" class="thumb-vid-title">Video 5.3: Prevención y seguridad en caso de emergencias</div>
            </div>
        </div>
    </div>

    <div id="module6" class="module content" hidden>
        <div class="moduleTitle">Módulo 6: Seguridad Vial y Prevención de Delitos</div><br>
        <div class="video-container">
            <div id="central-video-title" class="video-title">Video 6.1: Identificación de situaciones de riesgo</div>
            <video id="central-video" controls poster="../imagenes/miniaturas/6.1 Identificacion de situaciones de riesgo.jpg">
                <source id="central-video-source" src="../Videos/6.1 Identificacion de situaciones de riesgo.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail11" class="thumbnail" onclick="swapVideos(1)">
                <img id="thumbnail-image11" src="../imagenes/miniaturas/6.2 Estrategias de prevencion.jpg" alt="Miniatura Video 1">
                <div id="thumb-vid-title11" class="thumb-vid-title">Video 6.2: Estrategias de prevención</div>
            </div>
            <div id="thumbnail12" class="thumbnail" onclick="swapVideos(2)">
                <img id="thumbnail-image12" src="../imagenes/miniaturas/6.3 Seguridad personal.jpg" alt="Miniatura Video 2">
                <div id="thumb-vid-title12" class="thumb-vid-title">Video 6.3: Seguridad personal</div>
            </div>
        </div>
    </div>

    <div id="module7" class="module content" hidden>
        <div class="moduleTitle">Módulo 7: Disuación de delitos</div><br>
        <div class="video-container">
            <div id="central-video-title" class="video-title">Video 7.1: Respuestas en casos de emergencias</div>
            <video id="central-video" controls poster="../imagenes/miniaturas/7.1 Respuestas en casos de emergencias.jpg">
                <source id="central-video-source" src="../Videos/7.1 Respuestas en casos de emergencias.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail13" class="thumbnail" onclick="swapVideos(2)">
                <img id="thumbnail-image13" src="../imagenes/miniaturas/7.2 Interaccion con extraños.jpg" alt="Miniatura Video 1">
                <div id="thumb-vid-title13" class="thumb-vid-title">Video 7.2: Interacción con extraños</div>
            </div>
        </div>
    </div>

    <div id="module8" class="module content" hidden>
        <div class="moduleTitle">Módulo 8: Convivencia Vial y Cultura de la Paz</div><br>
        <div class="video-container">
            <div id="central-video-title" class="video-title">Video 8.1: Respeto mutuo en la vía pública</div>
            <video id="central-video" controls poster="../imagenes/miniaturas/8.1 Respeto mutuo en la via publica.jpg">
                <source id="central-video-source" src="../Videos/8.1 Respeto mutuo en la via publica.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail15" class="thumbnail" onclick="swapVideos(1)">
                <img id="thumbnail-image15" src="../imagenes/miniaturas/8.2 Resolucion de conflictos en la via.jpg" alt="Miniatura Video 1">
                <div id="thumb-vid-title15" class="thumb-vid-title">Video 8.2: Resolución de conflictos en la vía</div>
            </div>
            <div id="thumbnail16" class="thumbnail" onclick="swapVideos(2)">
                <img id="thumbnail-image16" src="../imagenes/miniaturas/8.3 Despedida.jpg" alt="Miniatura Video 2">
                <div id="thumb-vid-title16" class="thumb-vid-title">Video 8.3: Despedida</div>
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