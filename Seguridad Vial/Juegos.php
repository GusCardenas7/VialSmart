<?php
    require "../Admin/funciones/comprobarSesion.php";
?>


<html>
<head>
    <title>Juegos</title>
    <link rel="stylesheet" href="../CSS/videos.css">
    <script src="../JavaScript/juegos.js"></script>
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
       }

       $totalJuegos = 0;
       // Contar las lecciones asociadas a cada modulos_id
      foreach ($modulos as $moduloId) {
    // Contar lecciones para el moduloId actual
       $query = "SELECT COUNT(*) AS total_juegos FROM juegos WHERE lecciones_modulos_id = ?";
       $stmt = $con->prepare($query);
       $stmt->bind_param("i", $moduloId);
       $stmt->execute();
       $result = $stmt->get_result();
       $row = $result->fetch_assoc();

       // Sumar el total de lecciones al contador
       $totalJuegos += $row['total_juegos'];
    
    // Mostrar el resultado
       //echo "Total de lecciones para el módulo $moduloId: " . $row['total_juegos'] . "<br>";
      }

      //echo "Total de lecciones en todos los módulos: $totalJuegos";

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
        <div id="thumbnails" class="thumbnails">
            <div style="display:none;" id="thumbnail1" class="thumbnail" onclick="Sound()">
                <a href="Juego1.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1"></a>
                <div id="thumb-vid-title1" class="thumb-vid-title">Juego 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div style="display:none;" id="thumbnail2" class="thumbnail" onclick="Sound()">
                <a href="Juego2.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title1" class="thumb-vid-title">Juego 1.2: Los usuarios de la vía</div>
            </div>
            <div style="display:none;" id="thumbnail3" class="thumbnail" onclick="Sound()">
                <a href="Juego3.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title2" class="thumb-vid-title">Juego 1.3: La vía y sus partes</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="thumbnail1.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1">
                <div id="thumb-vid-title1" class="thumb-vid-title">Juego 1.1: ¿Qué es la seguridad vial?</div>
            </div>
            <div style="display:block;" id="thumbnail2.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1">
                <div id="thumb-vid-title1" class="thumb-vid-title">Juego 1.2: Los usuarios de la vía</div>
            </div>
            <div style="display:block;" id="thumbnail3.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2">
                <div id="thumb-vid-title2" class="thumb-vid-title">Juego 1.3: La vía y sus partes</div>
            </div>
        </div>
    </div>

    <div id="module2" class="module content" hidden>
        <div class="moduleTitle">Módulo 2: Señales de Tránsito</div><br>
        <div id="thumbnails" class="thumbnails">
            <div style="display:none;" id="thumbnail4" class="thumbnail" onclick="Sound()">
                <a href="Juego4.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Adivina.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title3" class="thumb-vid-title">Juego 2.1: Tipos de señales de tránsito</div>
            </div>
            <div style="display:none;" id="thumbnail5" class="thumbnail" onclick="Sound()">
                <a href="Juego5.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Unir.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title3" class="thumb-vid-title">Juego 2.2: Señales de tránsito más comunes</div>
            </div>
            <div style="display:none;" id="thumbnail6" class="thumbnail" onclick="Sound()">
               <a href="Juego6.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title4" class="thumb-vid-title">Juego 2.3: Señales especiales para niños</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="thumbnail4.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Adivina.png" alt="Miniatura Video 1">
                <div id="thumb-vid-title3" class="thumb-vid-title">Juego 2.1: Tipos de señales de tránsito</div>
            </div>
            <div style="display:block;" id="thumbnail5.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Unir.png" alt="Miniatura Video 1">
                <div id="thumb-vid-title3" class="thumb-vid-title">Juego 2.2: Señales de tránsito más comunes</div>
            </div>
            <div style="display:block;" id="thumbnail6.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2">
                <div id="thumb-vid-title4" class="thumb-vid-title">Juego 2.3: Señales especiales para niños</div>
            </div>
        </div>
    </div>

    <div id="module3" class="module content" hidden>
        <div class="moduleTitle">Módulo 3: Reglas Básicas de Seguridad Vial</div><br>
        <div id="thumbnails" class="thumbnails">
            <div style="display:none;" id="thumbnail7" class="thumbnail" onclick="Sound()">
                <a href="Juego7.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1"></a>
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 3.1: Cruce seguro de la calle</div>
            </div>
            <div style="display:none;" id="thumbnail8" class="thumbnail" onclick="Sound()">
                <a href="Juego8.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 3.2 Comportamiento peatonal seguro</div>
            </div>
            <div style="display:none;" id="thumbnail9" class="thumbnail" onclick="Sound()">
               <a href="Juego9.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title6" class="thumb-vid-title">Juego 3.3: Uso seguro de la bicicleta</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="thumbnail7.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1">
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 3.1: Cruce seguro de la calle</div>
            </div>
            <div style="display:block;" id="thumbnail8.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1">
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 3.2 Comportamiento peatonal seguro</div>
            </div>
            <div style="display:block;" id="thumbnail9.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2">
                <div id="thumb-vid-title6" class="thumb-vid-title">Juego 3.3: Uso seguro de la bicicleta</div>
            </div>

        </div>
    </div>

    <div id="module4" class="module content" hidden>
        <div class="moduleTitle">Módulo 4: Seguridad en el Vehículo</div><br>
        <div id="thumbnails" class="thumbnails">
            <div style="display:none;" id="thumbnail10" class="thumbnail" onclick="Sound()">
                <a href="Juego10.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Unir.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title7" class="thumb-vid-title">Juego 4.1: Uso del cinturón de seguridad</div>
            </div>
            <div style="display:none;" id="thumbnail11" class="thumbnail" onclick="Sound()">
                <a href="Juego11.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Adivina.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title7" class="thumb-vid-title">Juego 4.2: Comportamiento seguro en el automóvil</div>
            </div>
            <div style="display:none;" id="thumbnail12" class="thumbnail" onclick="Sound()">
                <a href="Juego12.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title8" class="thumb-vid-title">Juego 4.3: Transporte escolar</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="thumbnail10.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Unir.png" alt="Miniatura Video 1">
                <div id="thumb-vid-title7" class="thumb-vid-title">Juego 4.1: Uso del cinturón de seguridad</div>
            </div>
            <div style="display:block;" id="thumbnail11.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Adivina.png" alt="Miniatura Video 1">
                <div id="thumb-vid-title7" class="thumb-vid-title">Juego 4.2: Comportamiento seguro en el automóvil</div>
            </div>
            <div style="display:block;" id="thumbnail12.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2">
                <div id="thumb-vid-title8" class="thumb-vid-title">Juego 4.3: Transporte escolar</div>
            </div>
        </div>
    </div>

    <div id="module5" class="module content" hidden>
        <div class="moduleTitle">Módulo 5: Situaciones de Emergencia</div><br>
        <div id="thumbnails" class="thumbnails">
            <div style="display:none;" id="thumbnail13" class="thumbnail" onclick="Sound()">
                <a href="Juego13.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1"></a>
                <div id="thumb-vid-title9" class="thumb-vid-title">Juego 5.1: ¿Qué hacer en caso de accidente?</div>
            </div>
            <div style="display:none;" id="thumbnail14" class="thumbnail" onclick="Sound()">
                <a href="Juego14.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title9" class="thumb-vid-title">Juego 5.2: Primeros auxilios básicos</div>
            </div>
            <div style="display:none;" id="thumbnail15" class="thumbnail" onclick="Sound()">
                <a href="Juego15.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title10" class="thumb-vid-title">Juego 5.3: Prevención y seguridad en caso de desastres</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="thumbnail13.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1">
                <div id="thumb-vid-title9" class="thumb-vid-title">Juego 5.1: ¿Qué hacer en caso de accidente?</div>
            </div>
            <div style="display:block;" id="thumbnail14.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1">
                <div id="thumb-vid-title9" class="thumb-vid-title">Juego 5.2: Primeros auxilios básicos</div>
            </div>
            <div style="display:block;" id="thumbnail15.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2">
                <div id="thumb-vid-title10" class="thumb-vid-title">Juego 5.3: Prevención y seguridad en caso de desastres</div>
            </div>
        </div>
    </div>
    
    <div id="module6" class="module content" hidden>
        <div class="moduleTitle">Módulo 6: Seguridad Vial y Prevención de Delitos</div><br>
        <div id="thumbnails" class="thumbnails">
            <div style="display:none;" id="thumbnail16" class="thumbnail" onclick="Sound()">
                <a href="Juego16.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Unir.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title11" class="thumb-vid-title">Juego 6.1: Identificación de situaciones de riesgo</div>
            </div>
            <div style="display:none;" id="thumbnail17" class="thumbnail" onclick="Sound()">
                <a href="Juego17.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title11" class="thumb-vid-title">Juego 6.2: Estrategias de prevención</div>
            </div>
            <div style="display:none;" id="thumbnail18" class="thumbnail" onclick="Sound()">
                <a href="Juego18.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title12" class="thumb-vid-title">Juego 6.3: Seguridad personal</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="thumbnail16.1" class="thumbnail blocked">
                <img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Unir.png" alt="Miniatura Video 1">
                <div id="thumb-vid-title11" class="thumb-vid-title">Juego 6.1: Identificación de situaciones de riesgo</div>
            </div>
            <div style="display:block;" id="thumbnail17.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Memorama.png" alt="Miniatura Video 1">
                <div id="thumb-vid-title11" class="thumb-vid-title">Juego 6.2: Estrategias de prevención</div>
            </div>
            <div style="display:block;" id="thumbnail18.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2">
                <div id="thumb-vid-title12" class="thumb-vid-title">Juego 6.3: Seguridad personal</div>
            </div>
        </div>
    </div>

    <div id="module7" class="module content" hidden>
        <div class="moduleTitle">Módulo 7: Disuasión de delitos</div><br>
        <div id="thumbnails" class="thumbnails">
            <div style="display:none;" id="thumbnail19" class="thumbnail" onclick="Sound()">
                <a href="Juego19.php"><img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Adivina.png" alt="Miniatura Video 1"></a>
                <div id="thumb-vid-title13" class="thumb-vid-title">Juego 7.1: Respuestas en caso de emergencia</div>
            </div>
            <div style="display:none;" id="thumbnail20" class="thumbnail" onclick="Sound()">
                 <a href="Juego20.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title13" class="thumb-vid-title">Juego 7.2: Interacción con extraños</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="thumbnail19.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image3" src="../imagenes/miniaturas/Juego Adivina.png" alt="Miniatura Video 1">
                <div id="thumb-vid-title13" class="thumb-vid-title">Juego 7.1: Respuestas en caso de emergencia</div>
            </div>
            <div style="display:block;" id="thumbnail20.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2">
                <div id="thumb-vid-title13" class="thumb-vid-title">Juego 7.2: Interacción con extraños</div>
            </div>
        </div>
    </div>

    <div id="module8" class="module content" hidden>
        <div class="moduleTitle">Módulo 8: Convivencia vial y cultura de la paz</div><br>
        <div id="thumbnails" class="thumbnails">
            <div style="display:none;" id="thumbnail21" class="thumbnail" onclick="Sound()">
                <a href="Juego21.php"><img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1"></a>
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 8.1: Respeto mutuo en la vía pública</div>
            </div>
            <div style="display:none;" id="thumbnail22" class="thumbnail" onclick="Sound()">
                <a href="Juego22.php"><img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2"></a>
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 8.2: Resolución de conflictos en la vía</div>
            </div>
            <!-- Des -->
            <div style="display:block;" id="thumbnail21.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image1" src="../imagenes/miniaturas/Juego Puzzle.jpeg" alt="Miniatura Juego 1">
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 8.1: Respeto mutuo en la vía pública</div>
            </div>
            <div style="display:block;" id="thumbnail22.1" class="thumbnail blocked" onclick="Advice()">
                <img id="thumbnail-image2" src="../imagenes/miniaturas/Juego Quiz.webp" alt="Miniatura Video 2">
                <div id="thumb-vid-title5" class="thumb-vid-title">Juego 8.2: Resolución de conflictos en la vía</div>
            </div>
        </div>
    </div>
    <?php include 'chatbot.php'; ?>

    <?php 
     if($totalJuegos >= 1){
       echo "<script>document.getElementById('thumbnail1.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail1').style.display = 'block';</script>";
      }if($totalJuegos >= 2){
       echo "<script>document.getElementById('thumbnail2.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail2').style.display = 'block';</script>";
      }if($totalJuegos >= 3){
       echo "<script>document.getElementById('thumbnail3.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail3').style.display = 'block';</script>";
      }if($totalJuegos >= 4){
       echo "<script>document.getElementById('thumbnail4.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail4').style.display = 'block';</script>";
      }if($totalJuegos >= 5){
       echo "<script>document.getElementById('thumbnail5.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail5').style.display = 'block';</script>";
      }if($totalJuegos >= 6){
       echo "<script>document.getElementById('thumbnail6.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail6').style.display = 'block';</script>";
      }if($totalJuegos >= 7){
       echo "<script>document.getElementById('thumbnail7.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail7').style.display = 'block';</script>";
      }if($totalJuegos >= 8){
       echo "<script>document.getElementById('thumbnail8.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail8').style.display = 'block';</script>";
      }if($totalJuegos >= 9){
       echo "<script>document.getElementById('thumbnail9.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail9').style.display = 'block';</script>";
      }if($totalJuegos >= 10){
       echo "<script>document.getElementById('thumbnail10.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail10').style.display = 'block';</script>";
      }if($totalJuegos >= 11){
       echo "<script>document.getElementById('thumbnail11.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail11').style.display = 'block';</script>";
      }if($totalJuegos >= 12){
       echo "<script>document.getElementById('thumbnail12.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail12').style.display = 'block';</script>";
      }if($totalJuegos >= 13){
       echo "<script>document.getElementById('thumbnail13.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail13').style.display = 'block';</script>";
      }if($totalJuegos >= 14){
       echo "<script>document.getElementById('thumbnail14.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail14').style.display = 'block';</script>";
      }if($totalJuegos >= 15){
       echo "<script>document.getElementById('thumbnail15.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail15').style.display = 'block';</script>";
      }if($totalJuegos >= 16){
       echo "<script>document.getElementById('thumbnail16.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail16').style.display = 'block';</script>";
      }if($totalJuegos >= 17){
       echo "<script>document.getElementById('thumbnail17.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail17').style.display = 'block';</script>";
      }if($totalJuegos >= 18){
       echo "<script>document.getElementById('thumbnail18.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail18').style.display = 'block';</script>";
      }if($totalJuegos >= 19){
       echo "<script>document.getElementById('thumbnail19.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail19').style.display = 'block';</script>";
      }if($totalJuegos >= 20){
       echo "<script>document.getElementById('thumbnail20.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail20').style.display = 'block';</script>";
      }if($totalJuegos >= 21){
       echo "<script>document.getElementById('thumbnail21.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail21').style.display = 'block';</script>";
      }if($totalJuegos >= 22){
       echo "<script>document.getElementById('thumbnail22.1').style.display = 'none';</script>";
       echo "<script>document.getElementById('thumbnail22').style.display = 'block';</script>";
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