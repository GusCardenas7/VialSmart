<?php
    require "../Admin/funciones/comprobarSesion.php";
?>

<html>
<head>
    <title>Lecciones</title>
    <link rel="stylesheet" href="../CSS/leccionesPrincipal.css">
    <script src="../JavaScript/leccionesPrincipal.js"></script>
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
        <div class="moduleTitle tracking-in-expand-forward-top">Módulo 1: Introducción a la Seguridad Vial</div><br>
        <div id="lessons" class="lessons">
            <div id="lesson1" class="lesson blur-in-expand" onclick="goToLesson(1,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div id="lesson2" class="lesson blur-in-expand">
                <img id="lesson-image2" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 1.2: Los usuarios de la vía</div>
            </div>
            <div id="lesson3" class="lesson blur-in-expand">
                <img id="lesson-image3" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>
    <div id="module2" class="module content" hidden>
        <div class="moduleTitle">Módulo 1: Introducción a la Seguridad Vial</div><br>
        <div id="lessons" class="lessons">
            <div id="lesson1" class="lesson">
                <img id="lesson-image1" src="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div id="lesson2" class="lesson">
                <img id="lesson-image2" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 1.2: Los usuarios de la vía</div>
            </div>
            <div id="lesson3" class="lesson">
                <img id="lesson-image3" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>
    <div id="module3" class="module content" hidden>
        <div class="moduleTitle">Módulo 1: Introducción a la Seguridad Vial</div><br>
        <div id="lessons" class="lessons">
            <div id="lesson1" class="lesson">
                <img id="lesson-image1" src="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div id="lesson2" class="lesson">
                <img id="lesson-image2" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 1.2: Los usuarios de la vía</div>
            </div>
            <div id="lesson3" class="lesson">
                <img id="lesson-image3" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>
    <div id="module4" class="module content" hidden>
        <div class="moduleTitle">Módulo 1: Introducción a la Seguridad Vial</div><br>
        <div id="lessons" class="lessons">
            <div id="lesson1" class="lesson">
                <img id="lesson-image1" src="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div id="lesson2" class="lesson">
                <img id="lesson-image2" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 1.2: Los usuarios de la vía</div>
            </div>
            <div id="lesson3" class="lesson">
                <img id="lesson-image3" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>
    <div id="module5" class="module content" hidden>
        <div class="moduleTitle">Módulo 1: Introducción a la Seguridad Vial</div><br>
        <div id="lessons" class="lessons">
            <div id="lesson1" class="lesson">
                <img id="lesson-image1" src="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div id="lesson2" class="lesson">
                <img id="lesson-image2" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 1.2: Los usuarios de la vía</div>
            </div>
            <div id="lesson3" class="lesson">
                <img id="lesson-image3" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>
    <div id="module6" class="module content" hidden>
        <div class="moduleTitle">Módulo 1: Introducción a la Seguridad Vial</div><br>
        <div id="lessons" class="lessons">
            <div id="lesson1" class="lesson">
                <img id="lesson-image1" src="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div id="lesson2" class="lesson">
                <img id="lesson-image2" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 1.2: Los usuarios de la vía</div>
            </div>
            <div id="lesson3" class="lesson">
                <img id="lesson-image3" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>
    <div id="module7" class="module content" hidden>
        <div class="moduleTitle">Módulo 1: Introducción a la Seguridad Vial</div><br>
        <div id="lessons" class="lessons">
            <div id="lesson1" class="lesson">
                <img id="lesson-image1" src="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div id="lesson2" class="lesson">
                <img id="lesson-image2" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 1.2: Los usuarios de la vía</div>
            </div>
            <div id="lesson3" class="lesson">
                <img id="lesson-image3" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>
    <div id="module8" class="module content" hidden>
        <div class="moduleTitle">Módulo 1: Introducción a la Seguridad Vial</div><br>
        <div id="lessons" class="lessons">
            <div id="lesson1" class="lesson">
                <img id="lesson-image1" src="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div id="lesson2" class="lesson">
                <img id="lesson-image2" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 1.2: Los usuarios de la vía</div>
            </div>
            <div id="lesson3" class="lesson">
                <img id="lesson-image3" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 1.3: La vía y sus partes</div>
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