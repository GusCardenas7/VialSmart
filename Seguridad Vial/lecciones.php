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
            <div id="lesson2" class="lesson blur-in-expand" onclick="goToLesson(1,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title"> Lección 1.2: Los usuarios de la vía </div>
            </div>
            <div id="lesson3" class="lesson blur-in-expand" onclick="goToLesson(1,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>
    <div id="module2" class="module content" hidden>
        <div class="moduleTitle">Módulo 2: Señales de Tránsito</div><br>
        <div id="lessons" class="lessons">
            <div id="lesson1" class="lesson blur-in-expand" onclick="goToLesson(2,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/2.1 Tipos de señales de transito.jpg" alt="Lección 2.1">
                <div id="lesson-title1" class="lesson-title">Lección 2.1: Tipos de señales de tránsito</div>
            </div>
            <div id="lesson2" class="lesson blur-in-expand" onclick="goToLesson(2,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/2.2 Señales de transito mas comunes.jpg" alt="Lección 2.2">
                <div id="lesson-title2" class="lesson-title">Lección 2.2: Señales de tránsito más comunes</div>
            </div>
            <div id="lesson3" class="lesson blur-in-expand" onclick="goToLesson(2,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/2.3 Señales especiales para niños.jpg" alt="Lección 2.3">
                <div id="lesson-title3" class="lesson-title">Lección 2.3: Señales especiales para niños</div>
            </div>
        </div>
    </div>
    <div id="module2" class="module content" hidden>
        <div class="moduleTitle">Módulo 2: Señales de Tránsito</div><br>
        <div id="lessons" class="lessons">
            <div id="lesson1" class="lesson blur-in-expand" onclick="goToLesson(2,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/2.1 Tipos de señales de transito.jpg" alt="Lección 2.1">
                <div id="lesson-title1" class="lesson-title">Lección 2.1: Tipos de señales de tránsito</div>
            </div>
            <div id="lesson2" class="lesson blur-in-expand" onclick="goToLesson(2,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/2.2 Señales de transito mas comunes.jpg" alt="Lección 2.2">
                <div id="lesson-title2" class="lesson-title">Lección 2.2: Señales de tránsito más comunes</div>
            </div>
            <div id="lesson3" class="lesson blur-in-expand" onclick="goToLesson(2,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/2.3 Señales especiales para niños.jpg" alt="Lección 2.3">
                <div id="lesson-title3" class="lesson-title">Lección 2.3: Señales especiales para niños</div>
            </div>
        </div>
    </div>
    <div id="module3" class="module content" hidden>
        <div class="moduleTitle">Módulo 3: Reglas Básicas de Seguridad Vial</div><br>
        <div id="lessons" class="lessons">
           <div id="lesson1" class="lesson blur-in-expand" onclick="goToLesson(3,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/3.1 Cruce seguro de la calle.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 3.1: Cruce seguro de la calle</div>
            </div>
            <div id="lesson2" class="lesson blur-in-expand" onclick="goToLesson(3,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/3.2 Comportamiento peatonal seguro.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 3.2: Comportamiento peatonal seguro</div>
            </div>
            <div id="lesson3" class="lesson blur-in-expand" onclick="goToLesson(3,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/3.3 Uso seguro de la bicicleta.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 3.3: Uso seguro de la bicicleta</div>
            </div>
        </div>
    </div> 
    <div id="module4" class="module content" hidden>
        <div class="moduleTitle">Módulo 4: Seguridad en el Vehículo</div><br>
        <div id="lessons" class="lessons">
           <div id="lesson1" class="lesson blur-in-expand" onclick="goToLesson(4,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/4.1 Uso del cinturón de seguridad.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 4.1: Uso del cinturón de seguridad</div>
            </div>
            <div id="lesson2" class="lesson blur-in-expand" onclick="goToLesson(4,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/4.2 Comportamiento seguro en el automovil.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 4.2: Comportamiento seguro en el automóvil</div>
            </div>
            <div id="lesson3" class="lesson blur-in-expand" onclick="goToLesson(4,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/4.3 Transporte escolar.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 4.3: Transporte escolar</div>
            </div>
        </div>
    </div>
    <div id="module5" class="module content" hidden>
        <div class="moduleTitle">Módulo 5: Situaciones de Emergencia</div><br>
        <div id="lessons" class="lessons">
           <div id="lesson1" class="lesson blur-in-expand" onclick="goToLesson(5,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/5.1 Que hacer en caso de un accidente.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 5.1: Qué hacer en caso de un accidente</div>
            </div>
            <div id="lesson2" class="lesson blur-in-expand" onclick="goToLesson(5,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/5.2 Primeros auxilios basicos.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 5.2: Primeros auxilios básicos</div>
            </div>
            <div id="lesson3" class="lesson blur-in-expand" onclick="goToLesson(5,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/5.3 Prevencion y seguridad en caso de emergencias.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 5.3: Prevención y seguridad en casos de emergencia</div>
            </div>
        </div>
    </div>
     <div id="module6" class="module content" hidden>
        <div class="moduleTitle">Módulo 6: Seguridad Vial y Prevención de Delitos</div><br>
        <div id="lessons" class="lessons">
           <div id="lesson1" class="lesson blur-in-expand" onclick="goToLesson(6,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/6.1 Identificacion de situaciones de riesgo.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 6.1: Identificación de situaciones de riesgo</div>
            </div>
            <div id="lesson2" class="lesson blur-in-expand" onclick="goToLesson(6,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/6.2 Estrategias de prevencion.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 6.2: Estrategías de prevención</div>
            </div>
            <div id="lesson3" class="lesson blur-in-expand" onclick="goToLesson(6,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/6.3 Seguridad personal.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 6.3: Seguridad personal</div>
            </div>
        </div>
    </div>
     <div id="module7" class="module content" hidden>
        <div class="moduleTitle">Módulo 7: Disuación de delitos</div><br>
        <div id="lessons" class="lessons">
           <div id="lesson1" class="lesson blur-in-expand" onclick="goToLesson(7,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/7.1 Respuestas en casos de emergencias.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 7.1: Respuestas en caso de emergencias</div>
            </div>
            <div id="lesson2" class="lesson blur-in-expand" onclick="goToLesson(7,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/7.2 Interaccion con extraños.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 7.2: Interacción con extraños</div>
            </div>
        </div>
    </div>
    <div id="module8" class="module content" hidden>
        <div class="moduleTitle">Módulo 8: Convivencia Vial y Cultura de la Paz</div><br>
        <div id="lessons" class="lessons">
           <div id="lesson1" class="lesson blur-in-expand" onclick="goToLesson(8,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/8.1 Respeto mutuo en la via publica.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 8.1: Respeto mutuo en la vía pública</div>
            </div>
            <div id="lesson2" class="lesson blur-in-expand" onclick="goToLesson(8,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/8.2 Resolucion de conflictos en la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 8.2: Resolución de conflictos en la vía</div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    <!--
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
    </div> -->
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