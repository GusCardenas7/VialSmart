<?php
    require "../Admin/funciones/comprobarSesion.php";
?>

<html>
<head>
    <title>Ranking</title>
    <link rel="stylesheet" href="../CSS/ranking.css">
    <script src="../JavaScript/ranking.js"></script>
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
            <li><a id="a-module9" onclick="hideModules(9)">Ranking general</a></li> 
        </ul>
    </nav><br>
    <div id="module1" class="module content">
        <div class="moduleTitle">Módulo 1: Introducción a la Seguridad Vial</div><br>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail1" class="thumbnail">
                <a href="ranking1-1.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1"></a>
                <div id="thumb-vid-title1" class="thumb-vid-title">Juego 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div id="thumbnail2" class="thumbnail">
                <a href="ranking1-2.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title1" class="thumb-vid-title">Juego 1.2: Los usuarios de la vía</div>
            </div>
            <div id="thumbnail3" class="thumbnail">
                <a href="ranking1-3.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title2" class="thumb-vid-title">Juego 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>

    <div id="module2" class="module content" hidden>
        <div class="moduleTitle">Módulo 2: Señales de Tránsito</div><br>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail4" class="thumbnail">
                <a href="ranking2-1.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Adivina.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title3" class="thumb-vid-title">Juego 2.1: Tipos de señales de tránsito</div>
            </div>
            <div id="thumbnail5" class="thumbnail">
                <a href="ranking2-2.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Unir.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title3" class="thumb-vid-title">Juego 2.2: Señales de tránsito más comunes</div>
            </div>
            <div id="thumbnail6" class="thumbnail">
                <a href="ranking2-3.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title4" class="thumb-vid-title">Juego 2.3: Señales especiales para niños</div>
            </div>
        </div>
    </div>

    <div id="module3" class="module content" hidden>
        <div class="moduleTitle">Módulo 3: Reglas Básicas de Seguridad Vial</div><br>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail7" class="thumbnail" onclick="swapVideos(1)">
                <a href="ranking3-1.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1"></a>
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 3.1: Cruce seguro de la calle</div>
            </div>
            <div id="thumbnail8" class="thumbnail" onclick="swapVideos(1)">
                <a href="ranking3-2.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 3.2 Comportamiento peatonal seguro</div>
            </div>
            <div id="thumbnail9" class="thumbnail" onclick="swapVideos(2)">
               <a href="ranking3-3.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title6" class="thumb-vid-title">Juego 3.3: Uso seguro de la bicicleta</div>
            </div>
        </div>
    </div>

    <div id="module4" class="module content" hidden>
        <div class="moduleTitle">Módulo 4: Seguridad en el Vehículo</div><br>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail10" class="thumbnail" onclick="swapVideos(1)">
                <a href="ranking4-1.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Unir.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title7" class="thumb-vid-title">Juego 4.1: Uso del cinturón de seguridad</div>
            </div>
            <div id="thumbnail11" class="thumbnail" onclick="swapVideos(1)">
                <a href="ranking4-2.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Adivina.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title7" class="thumb-vid-title">Juego 4.2: Comportamiento seguro en el automóvil</div>
            </div>
            <div id="thumbnail12" class="thumbnail" onclick="swapVideos(2)">
                <a href="ranking4-3.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title8" class="thumb-vid-title">Juego 4.3: Transporte escolar</div>
            </div>
        </div>
    </div>

    <div id="module5" class="module content" hidden>
        <div class="moduleTitle">Módulo 5: Situaciones de Emergencia</div><br>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail13" class="thumbnail" onclick="swapVideos(1)">
                <a href="ranking5-1.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1"></a>
                <div id="thumb-vid-title9" class="thumb-vid-title">Juego 5.1: ¿Qué hacer en caso de accidente?</div>
            </div>
            <div id="thumbnail14" class="thumbnail" onclick="swapVideos(1)">
                <a href="ranking5-2.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title9" class="thumb-vid-title">Juego 5.2: Primeros auxilios básicos</div>
            </div>
            <div id="thumbnail15" class="thumbnail" onclick="swapVideos(2)">
                <a href="ranking5-3.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title10" class="thumb-vid-title">Juego 5.3: Prevención y seguridad en caso de desastres</div>
            </div>
        </div>
    </div>
    <!-- AQUI -->
    <div id="module6" class="module content" hidden>
        <div class="moduleTitle">Módulo 6: Seguridad Vial y Prevención de Delitos</div><br>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail11" class="thumbnail">
                <a href="ranking6-1.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Unir.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title11" class="thumb-vid-title">Juego 6.1: Identificación de situaciones de riesgo</div>
            </div>
            <div id="thumbnail11" class="thumbnail" onclick="swapVideos(1)">
                <a href="ranking6-2.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title11" class="thumb-vid-title">Juego 6.2: Estrategias de prevención</div>
            </div>
            <div id="thumbnail12" class="thumbnail" onclick="swapVideos(2)">
                <a href="ranking6-3.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title12" class="thumb-vid-title">Juego 6.3: Seguridad personal</div>
            </div>
        </div>
    </div>

    <div id="module7" class="module content" hidden>
        <div class="moduleTitle">Módulo 7: Disuación de delitos</div><br>
        <div id="thumbnails" class="thumbnails">
            <div id="thumbnail13" class="thumbnail" onclick="swapVideos(1)">
                <a href="ranking7-1.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Adivina.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title13" class="thumb-vid-title">Juego 7.1: Respuestas en caso de emergencia</div>
            </div>
            <div id="thumbnail13" class="thumbnail" onclick="swapVideos(1)">
                 <a href="ranking7-2.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title13" class="thumb-vid-title">Juego 7.2: Interacción con extraños</div>
            </div>
        </div>
    </div>

    <div id="module8" class="module content" hidden>
        <div class="moduleTitle">Módulo 8: Convivencia vial y cultura de la paz</div><br>
        <div id="thumbnails" class="thumbnails">
             <div id="thumbnail15" class="thumbnail" onclick="swapVideos(1)">
                <a href="ranking8-1.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1"></a>
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 8.1: Respeto mutuo en la vía pública</div>
            </div>
            <div id="thumbnail15" class="thumbnail" onclick="swapVideos(1)">
                <a href="ranking8-2.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 8.2: Resolución de conflictos en la vía</div>
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