<?php
    require "../Admin/funciones/comprobarSesion.php";
?>

<script>
var autoplayInterval = 10000;
var autoplayTimer = null;
var autoplay = true;
var newIndex = 1;

if (autoplay) {
     autoplayTimer = setInterval(function() {
     newIndex++;
     navigateSlider();
   }, autoplayInterval);
}

function resetSlider() { 
  clearInterval(autoplayTimer);
}

function navigateSlider() { 
  const slide1 = document.getElementById('slide1');
  const slide2 = document.getElementById('slide2');
  const slide3 = document.getElementById('slide3');
  const slide4 = document.getElementById('slide4');
  if (newIndex == 1) {
    slide1.checked = true;
  } else if (newIndex == 2) {
    slide2.checked = true;
  } else if (newIndex == 3) {
    slide3.checked = true;
  } else if (newIndex == 4) {
    slide4.checked = true;
    newIndex = 0;
  }
}
</script>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../CSS/principal_IndexSV.css">
    <link rel="stylesheet" href="principal/video.css">
    <script src="principal/video.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
   
    <title>Inicio</title>
</head>
<body>
<!-- MENU -->
    <?php 
        include '../funciones/menu.php'; 
    ?>
    <br><br><br>

<div class="content">
<!-- SLIDERS -->
<div id="slider">
        <input type="radio" name="slider" id="slide1" checked>
        <input type="radio" name="slider" id="slide2">
        <input type="radio" name="slider" id="slide3">
        <input type="radio" name="slider" id="slide4">
   <div id="slides">
     <div id="overflow">
      <div class="inner">
       <div class="slide slide_1">
        <div class="slide-content" style="-webkit-text-stroke-width: 1px; -webkit-text-stroke-color: #634c49;">
         <h2 style="font-size:26px;"><b>Conducir requiere atenci&#243;n,</b></h2>
         <p style="font-size:25px;"><b> como cuando juegas. <span style="color:#d87f6f;">&#33;No te distraigas!</b></span> </p>
        </div>
       </div>  <!-- Slide 2 -->
       <div class="slide slide_2" style="-webkit-text-stroke-width: 1px; -webkit-text-stroke-color: #515d3e;">
        <div class="slide-content">
         <h2 style="color:#8bdf6f; font-size:26px;"> <b>Usar tu tel&#233;fono mientras conduces,</b></h2>
         <p style="color:#66fb34; font-size:25px;"><b>es como manejar con los ojos cerrados.</b> </p> 
        </div>
       </div> <!-- Slide 3-->
       <div class="slide slide_3" style="-webkit-text-stroke-width: 1px; -webkit-text-stroke-color: #515d3e;">
        <div class="slide-content">
         <h2 style="color:#8ad671; font-size:28px;"><b>Beber y conducir no es un juego. </b></h2>
         <p style="color:#f5de4b; font-size:25px;"><b>&#33;Nunca lo hagas!</b></p>
        </div>
       </div> <!-- Slide 4 -->
       <div class="slide slide_4" style="-webkit-text-stroke-width: 1px; -webkit-text-stroke-color: #515d3e;">
        <div class="slide-content">
         <h2 style="color:#a9de79; font-size:28px;"> <b> Si miras tu tel&#233;fono al caminar, </b> </h2>
         <p style="color:#91c6d3; font-size:25px;"><b>es como jugar a ciegas &#33;Muy peligroso!</b></p>
        </div>
       </div> <!-- -->
      </div>
     </div>
   </div>

   <div id="controls">
     <label for="slide1"></label>
     <label for="slide2"></label>
     <label for="slide3"></label>
     <label for="slide4"></label>
   </div>
   <div id="bullets">
     <label for="slide1"></label>
     <label for="slide2"></label>
     <label for="slide3"></label>
     <label for="slide4"></label>
   </div>
</div>

<!-- CUADROS -->
<div class="container">
    <div class="row justify-content-center">
        <!-- Lecciones -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-2">
            <div class="card mt-5" style="box-shadow: 0px 1px 10px 1px #000;">
                <a href="../Seguridad Vial/lecciones.php">
                    <div class="cover-small" style="background-image: url('../imagenes/leccion2.jpg');">
                    </div>
                </a>
                <div class="card-body font" style="color:#49403e;">
                    <p class="text-center"> <b> Lecciones </b> </p>
                </div>
            </div>
        </div>

        <!-- Juegos -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-2">
            <div class="card mt-5" style="box-shadow: 0px 1px 10px 1px #000;">
                <a href="../Seguridad Vial/Juegos.php">
                    <div class="cover-small" style="background-image: url('../imagenes/juegos2.jpg');">
                    </div>
                </a>
                <div class="card-body font" style="color:#49403e;">
                    <p class="text-center"> <b> Juegos </b> </p>
                </div>
            </div>
        </div>

        <!-- Videos -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-2">
            <div class="card mt-5" style="box-shadow: 0px 1px 10px 1px #000;">
                <a href="../Seguridad Vial/videos.php">
                    <div class="cover-small" style="background-image: url('../imagenes/video3.jpg');">
                    </div>
                </a>
                <div class="card-body font" style="color:#49403e;">
                    <p class="text-center"> <b> Videos </b> </p>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<?php include 'chatbot.php'; ?>
<!--  Decoraciones  --> 
<div class="decoracion-semaforos">
    <img src="../imagenes/semaforos.png" alt="Semáforos" />
</div>

<div class="decoracion-carro">
    <img src="../imagenes/coche.png" alt="Carro" />
</div>

<div class="decoracion-ninos">
    <img src="../imagenes/grupo.png" alt="Niños" />
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