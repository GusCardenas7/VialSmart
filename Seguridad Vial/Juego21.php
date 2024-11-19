<?php
    require "../Admin/funciones/comprobarSesion.php"; 
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Puzzle Lecci&#243;n 8.1</title>
    <link rel="stylesheet" href="../CSS/puzzle.css"> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

 <!-- MENU -->
    <?php 
       include '../funciones/menu.php';  

         // Parte dónde se revisa si ya se ha desbloqueado antes o no
        require "../Admin/funciones/conecta.php";   
        $con = conecta();
        $id_usuario = $_SESSION['idU'];
       
       //checar el id de lecciones y modulos
       $sql = "SELECT * FROM modulos WHERE nombre='Convivencia vial y cultura de la paz' AND usuarios_id = $id_usuario"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_modulos = $row["id"];
       } 

       $sql = "SELECT * FROM lecciones WHERE nombre='Respeto mutuo' AND desbloqueado = 1 AND modulos_id = $id_modulos"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_lecciones = $row["id"];
       } 

       // Verifico si existe ya un registro con esos datos
        $sql = "SELECT * FROM juegos WHERE nombre='Respeto mutuo' AND tipo='Puzzle'  AND lecciones_id = $id_lecciones AND lecciones_modulos_id = $id_modulos";
        $res = $con->query($sql);
        $fila= mysqli_num_rows($res);

        while($row =$res->fetch_array()){
         $id_juego = $row["id"];
         $desbloqueado = $row["desbloqueado"];
         $puntajeInicial = $row["puntaje"];
        } 
        $fila= mysqli_num_rows($res);
        //echo "<script>alert('fila=$fila , desbloqueado=$desbloqueado, id_juego=$id_juego');</script>";
        if($fila == 0){
        $sql = "INSERT INTO juegos (nombre, tipo, desbloqueado, puntaje, lecciones_id, lecciones_modulos_id) VALUES ('Respeto mutuo','Puzzle',0,0,$id_lecciones ,$id_modulos);";
        $res = $con->query($sql);
        }
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
            <a href="Terminos.php">Términos y condiciones</a>
            <a href="Politica.php">Política de privacidad</a>
            <a href="Contacto_formulario.php">Contáctanos</a>
        </div>
        <span class="copyright">&copy; VialSmart 2024</span>
</footer>

   <!-- <script type="text/javascript" src="../JS/Juego21.js"></script> -->

</body>

</html>
<script>
var piezas = [0, 1, 2, 3, 4,
    5, 6, 7, 8, 9,
    10, 11, 12, 13, 14,
    15, 16, 17, 18, 19,
    20, 21, 22, 23, 24];

let temporizador = false;
let timer = 100;
let tiempoAtras = null;

let winAudio = new Audio('../audios/WinGame.wav');
let LoseAudio = new Audio('../audios/Lose2.wav');
let CorrectAudio = new Audio('../audios/right.wav');
let IncorrectAudio = new Audio('../audios/TimeOut.wav');
let ClickAudio = new Audio('../audios/Click2.wav');


//funciones

function Cronometro() {
    tiempoAtras = setInterval(() => {
        timer--;
        //console.log(timer);
        document.getElementById('input3').innerHTML = timer + ` segundos`;
        if (timer == 0) {
            clearInterval(tiempoAtras);
            bloquearTarjetas();
            LoseAudio.play();
            Swal.fire({
                title: '<span class="titulo"> &iexcl;Se acabo el tiempo!</span><br><span class="footer">Vuelve  a jugar para lograr desbloquear la siguiente lecci&#243;n.</span>',
                padding: '3em',
                html: '<img class="perder" src="../imagenes/gato_triste.gif" alt="" >',
                color: '#000000',
                background: '#ffffff',
                backdrop: `rgba(0,0,123,0.4)`,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                stopKeydownPropagation: false,
                showCancelButton: true,
                confirmButtonColor: '#E1A293',
                cancelButtonText: '<a class="quitar" href="Juego21.php">Volver a jugar</a>',
                cancelButtonColor: '#C1BDBC',
                confirmButtonText: '<a class="quitar" href="IndexSV.php">Ir a p&#225;gina principal</a>'
            })
            //-------
        }


    }, 1000)

}
function bloquearTarjetas() {
    for (let i = 0; i <= 24; i++) {
        let tarjetaBloqueada = document.getElementById(i);
        //tarjetaBloqueada.innerHTML = numeros[i];
        tarjetaBloqueada.innerHTML = `<img src="../imagenes/memoramas/Leccion8/${piezas[i]}.jpg" alt="">`;
        tarjetaBloqueada.disabled = true;
    }

}

function desordenar() {
    piezas.sort(function () { return Math.random() - 0.5 });
    console.log(piezas);
}

function seleccionar(casilla) {

    if (temporizador == false) {
        Cronometro();
        temporizador = true;
    }

    num_click = num_click + 1;
    console.log("Click: " + num_click);

    ClickAudio.play();

    if (num_click == 1) {
        casilla1 = casilla;
        deseleccionar();
        document.getElementById(casilla).style.border = "solid 2px yellow";
        //console.log("Memorizo primer click: "+casilla1);

    } else if (num_click == 2) {

        var casilla2 = casilla;

        //console.log(piezas);

        var aux = piezas[casilla1];
        piezas[casilla1] = piezas[casilla2];
        piezas[casilla2] = aux;

        //console.log(piezas);

        num_click = 0;

        //quitar el borde
        deseleccionar();

        CambiarPiezas();

        //comprobar que está correcto
        var fin = Finalizar();
        if (fin == true) {
            winAudio.play();
            clearInterval(tiempoAtras);
            var puntos = Puntos(timer);

           //---BD----
            // --- Llamada AJAX para actualizar la base de datos ---
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Admin/funciones/actualizar_Juegos.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                  if (xhr.status === 200) {
                    console.log("Respuesta del servidor: ", xhr.responseText); // Verifica la respuesta del servidor
                  } else {
                   console.error("Error: ", xhr.statusText); // Si hay un error, lo mostramos
                  }
                }
            };
            console.log("Enviando petición AJAX");
            xhr.send("id_juego=" + <?php echo $id_juego; ?> + "&puntaje="+puntos + "&id_modulos=" + <?php echo $id_modulos; ?> + "&nombre_leccion='Resolucion de conflictos en la via'"+ "&puntajeInicial=" + <?php echo $puntajeInicial; ?>);


            Swal.fire({
                title: '&iexcl;Lo lograste!<br><span class="footer">Has completado este juego y has desbloqueado la siguiente lecci&#243;n.</span><br><span style="color:#5c905f;" class="footer">Puntuaci&#243;n: </span>'+puntos,
                padding: '3em',
                html: '<img class="ganar" src="../imagenes/perrito_bailando.gif" alt="" >',
                color: '#000000',
                backdrop: `rgba(0,0,123,0.4)`,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                stopKeydownPropagation: false,
                showCancelButton: true,
                confirmButtonColor: '#6294D5',
                cancelButtonText: '<a class="quitar" href="lecciones.php">Ir a lecciones</a>',
                cancelButtonColor: '#F3F4AC',
                confirmButtonText: '<a class="quitar" href="leccion8-2.php">Siguiente</a>'
            })
            //-------

        }

    }

}

function deseleccionar() {
    for (var i = 0; i <= 24; i++) {
        document.getElementById(i).style.border = null;
    }
}

function CambiarPiezas() {

    for (var casilla = 0; casilla <= 24; casilla++) {
        var imagen = piezas[casilla];

        document.getElementById(casilla).src = "../imagenes/memoramas/Leccion8/" + imagen + ".jpg";
    }
}

function Finalizar() {
    var correcto = true;

    for (var i = 0; i <= 24; i++) {
        if (piezas[i] != i) {
            // console.log(piezas[i]);
            correcto = false;
        }
    }

    return correcto;

}

function Puntos(timer){
    var puntaje = 0;
    
   if(timer >= 50){
        puntaje = 100;
   }else if(timer < 50){
        var puntuacion = (50 - timer) * 2;
        puntaje = 100 - puntuacion;
   }
    return puntaje;
}

var num_click = 0;
var casilla1;

desordenar();
CambiarPiezas();

</script>