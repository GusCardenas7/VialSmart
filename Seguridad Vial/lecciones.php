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

        //Obtenemos el id de usuario
        require "../Admin/funciones/conecta.php";   
        $con = conecta();
        $id_usuario = $_SESSION['idU'];

       //checar el id de lecciones y modulos
       $sql = "SELECT * FROM modulos WHERE usuarios_id = $id_usuario"; //aquí varía el nombre del módulo
       $res = $con->query($sql);
       $modulos = []; // Crear un array vacío para almacenar los resultados

       while ($row = $res->fetch_assoc()) {
          $modulos[] = $row['id']; // Agregar cada fila al array
         // echo "<script>alert($modulos) </script>";
       }

       $totalLecciones = 0;
       // Contar las lecciones asociadas a cada modulos_id
      foreach ($modulos as $moduloId) {
    // Contar lecciones para el moduloId actual
       $query = "SELECT COUNT(*) AS total_lecciones FROM lecciones WHERE modulos_id = ?";
       $stmt = $con->prepare($query);
       $stmt->bind_param("i", $moduloId);
       $stmt->execute();
       $result = $stmt->get_result();
       $row = $result->fetch_assoc();

       // Sumar el total de lecciones al contador
       $totalLecciones += $row['total_lecciones'];
    
    // Mostrar el resultado
       //echo "Total de lecciones para el módulo $moduloId: " . $row['total_lecciones'] . "<br>";
      }

      //echo "Total de lecciones en todos los módulos: $totalLecciones";

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
            <div style="display:none;" id="lesson1" class="lesson blur-in-expand" onclick="goToLesson(1,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div style="display:none;" id="lesson2" class="lesson blur-in-expand" onclick="goToLesson(1,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title"> Lección 1.2: Los usuarios de la vía </div>
            </div>
            <div style="display:none;" id="lesson3" class="lesson blur-in-expand" onclick="goToLesson(1,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 1.3: La vía y sus partes</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="lesson1.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image1" src="../imagenes/miniaturas/1.1 Que es la seguridad vial.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div style="display:block;" id="lesson2.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image2" src="../imagenes/miniaturas/1.2 Usuarios de la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title"> Lección 1.2: Los usuarios de la vía </div>
            </div>
            <div style="display:block;" id="lesson3.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image3" src="../imagenes/miniaturas/1.3 La via y sus partes.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>
    <div id="module2" class="module content" hidden>
        <div class="moduleTitle">Módulo 2: Señales de Tránsito</div><br>
        <div id="lessons" class="lessons">
            <div style="display:none;" id="lesson4" class="lesson blur-in-expand" onclick="goToLesson(2,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/2.1 Tipos de señales de transito.jpg" alt="Lección 2.1">
                <div id="lesson-title1" class="lesson-title">Lección 2.1: Tipos de señales de tránsito</div>
            </div>
            <div style="display:none;" id="lesson5" class="lesson blur-in-expand" onclick="goToLesson(2,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/2.2 Señales de transito mas comunes.jpg" alt="Lección 2.2">
                <div id="lesson-title2" class="lesson-title">Lección 2.2: Señales de tránsito más comunes</div>
            </div>
            <div style="display:none;" id="lesson6" class="lesson blur-in-expand" onclick="goToLesson(2,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/2.3 Señales especiales para niños.jpg" alt="Lección 2.3">
                <div id="lesson-title3" class="lesson-title">Lección 2.3: Señales especiales para niños</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="lesson4.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image1" src="../imagenes/miniaturas/2.1 Tipos de señales de transito.jpg" alt="Lección 2.1">
                <div id="lesson-title1" class="lesson-title">Lección 2.1: Tipos de señales de tránsito</div>
            </div>
            <div style="display:block;" id="lesson5.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image2" src="../imagenes/miniaturas/2.2 Señales de transito mas comunes.jpg" alt="Lección 2.2">
                <div id="lesson-title2" class="lesson-title">Lección 2.2: Señales de tránsito más comunes</div>
            </div>
            <div style="display:block;" id="lesson6.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image3" src="../imagenes/miniaturas/2.3 Señales especiales para niños.jpg" alt="Lección 2.3">
                <div id="lesson-title3" class="lesson-title">Lección 2.3: Señales especiales para niños</div>
            </div>
        </div>
    </div>
    <div id="module3" class="module content" hidden>
        <div class="moduleTitle">Módulo 3: Reglas Básicas de Seguridad Vial</div><br>
        <div id="lessons" class="lessons">
           <div style="display:none;" id="lesson7" class="lesson blur-in-expand" onclick="goToLesson(3,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/3.1 Cruce seguro de la calle.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 3.1: Cruce seguro de la calle</div>
            </div>
            <div style="display:none;" id="lesson8" class="lesson blur-in-expand" onclick="goToLesson(3,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/3.2 Comportamiento peatonal seguro.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 3.2: Comportamiento peatonal seguro</div>
            </div>
            <div style="display:none;" id="lesson9" class="lesson blur-in-expand" onclick="goToLesson(3,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/3.3 Uso seguro de la bicicleta.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 3.3: Uso seguro de la bicicleta</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="lesson7.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image1" src="../imagenes/miniaturas/3.1 Cruce seguro de la calle.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 3.1: Cruce seguro de la calle</div>
            </div>
            <div style="display:block;" id="lesson8.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image2" src="../imagenes/miniaturas/3.2 Comportamiento peatonal seguro.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 3.2: Comportamiento peatonal seguro</div>
            </div>
            <div style="display:block;" id="lesson9.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image3" src="../imagenes/miniaturas/3.3 Uso seguro de la bicicleta.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 3.3: Uso seguro de la bicicleta</div>
            </div>
        </div>
    </div> 
    <div id="module4" class="module content" hidden>
        <div class="moduleTitle">Módulo 4: Seguridad en el Vehículo</div><br>
        <div id="lessons" class="lessons">
           <div style="display:none;" id="lesson10" class="lesson blur-in-expand" onclick="goToLesson(4,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/4.1 Uso del cinturón de seguridad.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 4.1: Uso del cinturón de seguridad</div>
            </div>
            <div style="display:none;" id="lesson11" class="lesson blur-in-expand" onclick="goToLesson(4,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/4.2 Comportamiento seguro en el automovil.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 4.2: Comportamiento seguro en el automóvil</div>
            </div>
            <div style="display:none;" id="lesson12" class="lesson blur-in-expand" onclick="goToLesson(4,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/4.3 Transporte escolar.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 4.3: Transporte escolar</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="lesson10.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image1" src="../imagenes/miniaturas/4.1 Uso del cinturón de seguridad.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 4.1: Uso del cinturón de seguridad</div>
            </div>
            <div style="display:block;" id="lesson11.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image2" src="../imagenes/miniaturas/4.2 Comportamiento seguro en el automovil.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 4.2: Comportamiento seguro en el automóvil</div>
            </div>
            <div style="display:block;" id="lesson12.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image3" src="../imagenes/miniaturas/4.3 Transporte escolar.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 4.3: Transporte escolar</div>
            </div>
        </div>
    </div>
    <div id="module5" class="module content" hidden>
        <div class="moduleTitle">Módulo 5: Situaciones de Emergencia</div><br>
        <div id="lessons" class="lessons">
           <div style="display:none;" id="lesson13" class="lesson blur-in-expand" onclick="goToLesson(5,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/5.1 Que hacer en caso de un accidente.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 5.1: Qué hacer en caso de un accidente</div>
            </div>
            <div style="display:none;" id="lesson14" class="lesson blur-in-expand" onclick="goToLesson(5,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/5.2 Primeros auxilios basicos.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 5.2: Primeros auxilios básicos</div>
            </div>
            <div style="display:none;" id="lesson15" class="lesson blur-in-expand" onclick="goToLesson(5,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/5.3 Prevencion y seguridad en caso de emergencias.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 5.3: Prevención y seguridad en casos de emergencia</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="lesson13.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image1" src="../imagenes/miniaturas/5.1 Que hacer en caso de un accidente.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 5.1: Qué hacer en caso de un accidente</div>
            </div>
            <div style="display:block;" id="lesson14.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image2" src="../imagenes/miniaturas/5.2 Primeros auxilios basicos.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 5.2: Primeros auxilios básicos</div>
            </div>
            <div style="display:block;" id="lesson15.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image3" src="../imagenes/miniaturas/5.3 Prevencion y seguridad en caso de emergencias.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 5.3: Prevención y seguridad en casos de emergencia</div>
            </div>
        </div>
    </div>
     <div id="module6" class="module content" hidden>
        <div class="moduleTitle">Módulo 6: Seguridad Vial y Prevención de Delitos</div><br>
        <div id="lessons" class="lessons">
           <div style="display:none;" id="lesson16" class="lesson blur-in-expand" onclick="goToLesson(6,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/6.1 Identificacion de situaciones de riesgo.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 6.1: Identificación de situaciones de riesgo</div>
            </div>
            <div style="display:none;" id="lesson17" class="lesson blur-in-expand" onclick="goToLesson(6,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/6.2 Estrategias de prevencion.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 6.2: Estrategías de prevención</div>
            </div>
            <div style="display:none;" id="lesson18" class="lesson blur-in-expand" onclick="goToLesson(6,3)">
                <img id="lesson-image3" src="../imagenes/miniaturas/6.3 Seguridad personal.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 6.3: Seguridad personal</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="lesson16.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image1" src="../imagenes/miniaturas/6.1 Identificacion de situaciones de riesgo.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 6.1: Identificación de situaciones de riesgo</div>
            </div>
            <div style="display:block;" id="lesson17.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image2" src="../imagenes/miniaturas/6.2 Estrategias de prevencion.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 6.2: Estrategías de prevención</div>
            </div>
            <div style="display:block;" id="lesson18.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image3" src="../imagenes/miniaturas/6.3 Seguridad personal.jpg" alt="Lección 3">
                <div id="lesson-title3" class="lesson-title">Lección 6.3: Seguridad personal</div>
            </div>
        </div>
    </div>
     <div id="module7" class="module content" hidden>
        <div class="moduleTitle">Módulo 7: Disuasión de delitos</div><br>
        <div id="lessons" class="lessons">
           <div style="display:none;" id="lesson19" class="lesson blur-in-expand" onclick="goToLesson(7,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/7.1 Respuestas en casos de emergencias.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 7.1: Respuestas en caso de emergencias</div>
            </div>
            <div style="display:none;" id="lesson20" class="lesson blur-in-expand" onclick="goToLesson(7,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/7.2 Interaccion con extraños.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 7.2: Interacción con extraños</div>
            </div>
            <!-- Des-->
            <div style="display:block;" id="lesson19.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image1" src="../imagenes/miniaturas/7.1 Respuestas en casos de emergencias.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 7.1: Respuestas en caso de emergencias</div>
            </div>
            <div style="display:block;" id="lesson20.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image2" src="../imagenes/miniaturas/7.2 Interaccion con extraños.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 7.2: Interacción con extraños</div>
            </div>
        </div>
    </div>
    <div id="module8" class="module content" hidden>
        <div class="moduleTitle">Módulo 8: Convivencia Vial y Cultura de la Paz</div><br>
        <div id="lessons" class="lessons">
           <div style="display:none;" id="lesson21" class="lesson blur-in-expand" onclick="goToLesson(8,1)">
                <img id="lesson-image1" src="../imagenes/miniaturas/8.1 Respeto mutuo en la via publica.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 8.1: Respeto mutuo en la vía pública</div>
            </div>
            <div style="display:none;" id="lesson22" class="lesson blur-in-expand" onclick="goToLesson(8,2)">
                <img id="lesson-image2" src="../imagenes/miniaturas/8.2 Resolucion de conflictos en la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 8.2: Resolución de conflictos en la vía</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="lesson21.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image1" src="../imagenes/miniaturas/8.1 Respeto mutuo en la via publica.jpg" alt="Lección 1">
                <div id="lesson-title1" class="lesson-title">Lección 8.1: Respeto mutuo en la vía pública</div>
            </div>
            <div style="display:block;" id="lesson22.1" class="lesson blur-in-expand blocked" onclick="Advice()">
                <img id="lesson-image2" src="../imagenes/miniaturas/8.2 Resolucion de conflictos en la via.jpg" alt="Lección 2">
                <div id="lesson-title2" class="lesson-title">Lección 8.2: Resolución de conflictos en la vía</div>
            </div>
        </div>
    </div> 
    <?php include 'chatbot.php'; ?>

    <?php 
     if($totalLecciones >= 1){
       echo "<script>document.getElementById('lesson1.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson1').style.display = 'block';</script>";
      }if($totalLecciones >= 2){
       echo "<script>document.getElementById('lesson2.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson2').style.display = 'block';</script>";
      }if($totalLecciones >= 3){
       echo "<script>document.getElementById('lesson3.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson3').style.display = 'block';</script>";
      }if($totalLecciones >= 4){
       echo "<script>document.getElementById('lesson4.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson4').style.display = 'block';</script>";
      }if($totalLecciones >= 5){
       echo "<script>document.getElementById('lesson5.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson5').style.display = 'block';</script>";
      }if($totalLecciones >= 6){
       echo "<script>document.getElementById('lesson6.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson6').style.display = 'block';</script>";
      }if($totalLecciones >= 7){
       echo "<script>document.getElementById('lesson7.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson7').style.display = 'block';</script>";
      }if($totalLecciones >= 8){
       echo "<script>document.getElementById('lesson8.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson8').style.display = 'block';</script>";
      }if($totalLecciones >= 9){
       echo "<script>document.getElementById('lesson9.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson9').style.display = 'block';</script>";
      }if($totalLecciones >= 10){
       echo "<script>document.getElementById('lesson10.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson10').style.display = 'block';</script>";
      }if($totalLecciones >= 11){
       echo "<script>document.getElementById('lesson11.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson11').style.display = 'block';</script>";
      }if($totalLecciones >= 12){
       echo "<script>document.getElementById('lesson12.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson12').style.display = 'block';</script>";
      }if($totalLecciones >= 13){
       echo "<script>document.getElementById('lesson13.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson13').style.display = 'block';</script>";
      }if($totalLecciones >= 14){
       echo "<script>document.getElementById('lesson14.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson14').style.display = 'block';</script>";
      }if($totalLecciones >= 15){
       echo "<script>document.getElementById('lesson15.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson15').style.display = 'block';</script>";
      }if($totalLecciones >= 16){
       echo "<script>document.getElementById('lesson16.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson16').style.display = 'block';</script>";
      }if($totalLecciones >= 17){
       echo "<script>document.getElementById('lesson17.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson17').style.display = 'block';</script>";
      }if($totalLecciones >= 18){
       echo "<script>document.getElementById('lesson18.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson18').style.display = 'block';</script>";
      }if($totalLecciones >= 19){
       echo "<script>document.getElementById('lesson19.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson19').style.display = 'block';</script>";
      }if($totalLecciones >= 20){
       echo "<script>document.getElementById('lesson20.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson20').style.display = 'block';</script>";
      }if($totalLecciones >= 21){
       echo "<script>document.getElementById('lesson21.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson21').style.display = 'block';</script>";
      }if($totalLecciones >= 22){
       echo "<script>document.getElementById('lesson22.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('lesson22').style.display = 'block';</script>";
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