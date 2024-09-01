<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Puzzle Lecci&#243;n 1</title>
    <link rel="stylesheet" href="../CSS/puzzle.css"> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

 <!-- MENU -->
    <?php 
        include '../funciones/menu.php'; 
    ?>
    <br><br><br>

<!-- Juego Puzzle Inicio-->

<!-- <h1 align="center">Rompecabezas</h1> -->

 <main> 
 <section class="section1">
<table>
   <tr>
       <td><img id="0" src="../imagenes/memoramas/Leccion1/0.png" onclick="seleccionar(0)"></td>
       <td><img id="1" src="../imagenes/memoramas/Leccion1/1.png" onclick="seleccionar(1)"></td>
       <td><img id="2" src="../imagenes/memoramas/Leccion1/2.png" onclick="seleccionar(2)"></td>
       <td><img id="3" src="../imagenes/memoramas/Leccion1/3.png" onclick="seleccionar(3)"></td>
       <td><img id="4" src="../imagenes/memoramas/Leccion1/4.png" onclick="seleccionar(4)"></td>
   </tr
   <tr>
       <td><img id="5" src="../imagenes/memoramas/Leccion1/5.png" onclick="seleccionar(5)"></td>
       <td><img id="6" src="../imagenes/memoramas/Leccion1/6.png" onclick="seleccionar(6)"></td>
       <td><img id="7" src="../imagenes/memoramas/Leccion1/7.png" onclick="seleccionar(7)"></td>
       <td><img id="8" src="../imagenes/memoramas/Leccion1/8.png" onclick="seleccionar(8)"></td>
       <td><img id="9" src="../imagenes/memoramas/Leccion1/9.png" onclick="seleccionar(9)"></td>
   </tr>
   <tr>
       <td><img id="10" src="../imagenes/memoramas/Leccion1/10.png" onclick="seleccionar(10)"></td>
       <td><img id="11" src="../imagenes/memoramas/Leccion1/11.png" onclick="seleccionar(11)"></td>
       <td><img id="12" src="../imagenes/memoramas/Leccion1/12.png" onclick="seleccionar(12)"></td>
       <td><img id="13" src="../imagenes/memoramas/Leccion1/13.png" onclick="seleccionar(13)"></td>
       <td><img id="14" src="../imagenes/memoramas/Leccion1/14.png" onclick="seleccionar(14)"></td>
   </tr>
   <tr>
       <td><img id="15" src="../imagenes/memoramas/Leccion1/15.png" onclick="seleccionar(15)"></td>
       <td><img id="16" src="../imagenes/memoramas/Leccion1/16.png" onclick="seleccionar(16)"></td>
       <td><img id="17" src="../imagenes/memoramas/Leccion1/17.png" onclick="seleccionar(17)"></td>
       <td><img id="18" src="../imagenes/memoramas/Leccion1/18.png" onclick="seleccionar(18)"></td>
       <td><img id="19" src="../imagenes/memoramas/Leccion1/19.png" onclick="seleccionar(19)"></td>
   </tr>
   <tr>
       <td><img id="20" src="../imagenes/memoramas/Leccion1/20.png" onclick="seleccionar(20)"></td>
       <td><img id="21" src="../imagenes/memoramas/Leccion1/21.png" onclick="seleccionar(21)"></td>
       <td><img id="22" src="../imagenes/memoramas/Leccion1/22.png" onclick="seleccionar(22)"></td>
       <td><img id="23" src="../imagenes/memoramas/Leccion1/23.png" onclick="seleccionar(23)"></td>
       <td><img id="24" src="../imagenes/memoramas/Leccion1/24.png" onclick="seleccionar(24)"></td>
   </tr
</table>
</section>
<!--Como Jugar-->
 <div class="jugar">
   <div> <img class="pregunta" src="../imagenes/pregunta.png" alt="" > </div>
   <h2 class="recuadro">&iquest;Como Jugar?</h2>
   <h3 class="descripcion">Intercambia cada pieza de lugar hasta obtener la im&aacute;gen correcta.</h3>
 </div>
<!-- Imagen Correcta -->
 <div class="imagen_correcta">
   
   <div> <img class="fondo" src="../imagenes/memoramas/Leccion1/SV_memorama.jfif" alt="" > </div>
 </div>
</div>
<!-- Tiempo -->
<section class="section2" align="center">
    <div> <img class="sol" src="../imagenes/dom.png" alt="" > </div>
    <h2 id="t-restante" class="estadisticas">Tiempo = <br><span id="input3"></h2>
</section>
<!-- Rompecabezas -->
<div class="mano"> <img class="rompecabezas" src="../imagenes/rompecabezas.png" alt="" > </div>

 </main>
 <!-- footer -->
<footer>
        <div class="links">
            <a href="">Términos y condiciones</a>
            <a href="">Política de privacidad</a>
            <a href="../contacto_formulario.php">Contáctanos</a>
        </div>
        <span class="copyright">&copy; VialSmart 2024</span>
</footer>

   <script type="text/javascript" src="../JS/puzzle.js"></script> 

</body>

</html>

