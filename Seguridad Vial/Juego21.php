<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Puzzle Lecci&#243;n 21</title>
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
       <td><img id="0" src="../imagenes/memoramas/Leccion8/0.jpg" onclick="seleccionar(0)"></td>
       <td><img id="1" src="../imagenes/memoramas/Leccion8/1.jpg" onclick="seleccionar(1)"></td>
       <td><img id="2" src="../imagenes/memoramas/Leccion8/2.jpg" onclick="seleccionar(2)"></td>
       <td><img id="3" src="../imagenes/memoramas/Leccion8/3.jpg" onclick="seleccionar(3)"></td>
       <td><img id="4" src="../imagenes/memoramas/Leccion8/4.jpg" onclick="seleccionar(4)"></td>
   </tr
   <tr>
       <td><img id="5" src="../imagenes/memoramas/Leccion8/5.jpg" onclick="seleccionar(5)"></td>
       <td><img id="6" src="../imagenes/memoramas/Leccion8/6.jpg" onclick="seleccionar(6)"></td>
       <td><img id="7" src="../imagenes/memoramas/Leccion8/7.jpg" onclick="seleccionar(7)"></td>
       <td><img id="8" src="../imagenes/memoramas/Leccion8/8.jpg" onclick="seleccionar(8)"></td>
       <td><img id="9" src="../imagenes/memoramas/Leccion8/9.jpg" onclick="seleccionar(9)"></td>
   </tr>
   <tr>
       <td><img id="10" src="../imagenes/memoramas/Leccion8/10.jpg" onclick="seleccionar(10)"></td>
       <td><img id="11" src="../imagenes/memoramas/Leccion8/11.jpg" onclick="seleccionar(11)"></td>
       <td><img id="12" src="../imagenes/memoramas/Leccion8/12.jpg" onclick="seleccionar(12)"></td>
       <td><img id="13" src="../imagenes/memoramas/Leccion8/13.jpg" onclick="seleccionar(13)"></td>
       <td><img id="14" src="../imagenes/memoramas/Leccion8/14.jpg" onclick="seleccionar(14)"></td>
   </tr>
   <tr>
       <td><img id="15" src="../imagenes/memoramas/Leccion8/15.jpg" onclick="seleccionar(15)"></td>
       <td><img id="16" src="../imagenes/memoramas/Leccion8/16.jpg" onclick="seleccionar(16)"></td>
       <td><img id="17" src="../imagenes/memoramas/Leccion8/17.jpg" onclick="seleccionar(17)"></td>
       <td><img id="18" src="../imagenes/memoramas/Leccion8/18.jpg" onclick="seleccionar(18)"></td>
       <td><img id="19" src="../imagenes/memoramas/Leccion8/19.jpg" onclick="seleccionar(19)"></td>
   </tr>
   <tr>
       <td><img id="20" src="../imagenes/memoramas/Leccion8/20.jpg" onclick="seleccionar(20)"></td>
       <td><img id="21" src="../imagenes/memoramas/Leccion8/21.jpg" onclick="seleccionar(21)"></td>
       <td><img id="22" src="../imagenes/memoramas/Leccion8/22.jpg" onclick="seleccionar(22)"></td>
       <td><img id="23" src="../imagenes/memoramas/Leccion8/23.jpg" onclick="seleccionar(23)"></td>
       <td><img id="24" src="../imagenes/memoramas/Leccion8/24.jpg" onclick="seleccionar(24)"></td>
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
   
   <div> <img class="fondo" src="../imagenes/memoramas/Leccion8/SV_memorama.jpg" alt="" > </div>
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

   <script type="text/javascript" src="../JS/Juego21.js"></script> 

</body>

</html>