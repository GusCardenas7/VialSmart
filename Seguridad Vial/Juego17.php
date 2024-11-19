<?php
    require "../Admin/funciones/comprobarSesion.php"; 
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../CSS/Juego2.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title> Memorama Lección 6.2 </title>

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
       $sql = "SELECT * FROM modulos WHERE nombre='Seguridad vial y prevencion de delitos' AND usuarios_id = $id_usuario"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_modulos = $row["id"];
       } 

       $sql = "SELECT * FROM lecciones WHERE nombre='Estrategias de prevencion' AND desbloqueado = 1 AND modulos_id = $id_modulos"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_lecciones = $row["id"];
       } 

       // Verifico si existe ya un registro con esos datos
        $sql = "SELECT * FROM juegos WHERE nombre='Estrategias de prevencion' AND tipo='memorama'  AND lecciones_id = $id_lecciones AND lecciones_modulos_id = $id_modulos";
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
        $sql = "INSERT INTO juegos (nombre, tipo, desbloqueado, puntaje, lecciones_id, lecciones_modulos_id) VALUES ('Estrategias de prevencion','memorama',0,0,$id_lecciones ,$id_modulos);";
        $res = $con->query($sql);
        }

    ?>
    <br><br><br>

    <!-- Juego -->
    <h1 style="color:#000000;">🚫 Estrategias de prevención 🚫</h1>
    <h3 class="desc"> Encuentra todos los pares al hacer click sobre cada una de los recuadros.</h3><br>
    <main>
        <section class="section1">
            <table>
                <tr>
                    <td><button id="0" onclick="destapar(0)"></button></td>
                    <td><button id="1" onclick="destapar(1)"></button></td>
                    <td><button id="2" onclick="destapar(2)"></button></td>
                    <td><button id="3" onclick="destapar(3)"></button></td>
                </tr>
                <tr>
                    <td><button id="4" onclick="destapar(4)"></button></td>
                    <td><button id="5" onclick="destapar(5)"></button></td>
                    <td><button id="6" onclick="destapar(6)"></button></td>
                    <td><button id="7" onclick="destapar(7)"></button></td>
                </tr>
                <tr>
                    <td><button id="8" onclick="destapar(8)"></button></td>
                    <td><button id="9" onclick="destapar(9)"></button></td>
                    <td><button id="10" onclick="destapar(10)"></button></td>
                    <td><button id="11" onclick="destapar(11)"></button></td>
                </tr>
                <tr>
                    <td><button id="12" onclick="destapar(12)"></button></td>
                    <td><button id="13" onclick="destapar(13)"></button></td>
                    <td><button id="14" onclick="destapar(14)"></button></td>
                    <td><button id="15" onclick="destapar(15)"></button></td>
                </tr>

            </table>

        </section>
        <section class="section2">
            <div> <img class="sol" src="../imagenes/dom.png" alt="" > </div>
            <h2 id="aciertos" class="estadisticas">Aciertos = <span id="input2"></h2>
            <h2 id="t-restante" class="estadisticas">Tiempo = <span id="input3"></h2>
            <h2 id="movimientos" class="estadisticas">Movimientos = <span id="input"></h2>

        </section>

    </main>
    <div id="mascota" class="decoracion2"> <img src="../imagenes/calle.png" alt=""> </div>
     <!-- footer -->
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

<script>

//Variables
let tarjetasDestapadas = 0;
let Tarjeta1 = null;
let Tarjeta2 = null;
let primerResultado = null;
let segundoResultado = null;
let movimientos = 0;
let aciertos = 0;
let temporizador = false;
let timer = 40;
let tiempoAtras = null;

let winAudio = new Audio('../audios/WinGame.wav');
let LoseAudio = new Audio('../audios/Lose2.wav');
let CorrectAudio = new Audio('../audios/right.wav');
let IncorrectAudio = new Audio('../audios/TimeOut.wav');
let ClickAudio = new Audio('../audios/Click2.wav');


//Desordenar numeros
let numeros = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8];
numeros = numeros.sort(()=>{return Math.random()-0.5});

console.log(numeros);

function Cronometro() {
    tiempoAtras = setInterval(()=>{
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
                cancelButtonText: '<a class="quitar" href="Juego17.php">Volver a jugar</a>',
                cancelButtonColor: '#C1BDBC',
                confirmButtonText: '<a class="quitar" href="IndexSV.php">P&#225;gina principal</a>'
            })
           //-------

        }
        

    },1000)

}

function bloquearTarjetas() {
    for (let i = 0; i <= 15; i++) {
        let tarjetaBloqueada = document.getElementById(i);
        //tarjetaBloqueada.innerHTML = numeros[i];
        tarjetaBloqueada.innerHTML = `<img src="../imagenes/Puzzle/Leccion17/${numeros[i]}.png" alt="">`;
        tarjetaBloqueada.disabled = true;
    }

}
// funcion principal
function destapar(id) {

    if (temporizador == false) {
        Cronometro();
        temporizador = true;
    }

    tarjetasDestapadas++;
    console.log(tarjetasDestapadas)

    if (tarjetasDestapadas == 1) {
        //Mostrar primer numero
        Tarjeta1 = document.getElementById(id);
        primerResultado = numeros[id];
        //Tarjeta1.innerHTML = primerResultado;
        Tarjeta1.innerHTML = `<img src="../imagenes/Puzzle/Leccion17/${primerResultado}.png" alt="">`;
        ClickAudio.play();

        Tarjeta1.disabled = true;

    } else if (tarjetasDestapadas == 2) {
        Tarjeta2 = document.getElementById(id);
        segundoResultado = numeros[id];
        //Tarjeta2.innerHTML = segundoResultado;
        Tarjeta2.innerHTML = `<img src="../imagenes/Puzzle/Leccion17/${segundoResultado}.png" alt="">`;

        Tarjeta2.disabled = true;
        
        movimientos++;
        console.log(movimientos);
        document.getElementById('input').innerHTML = movimientos;

        if (primerResultado == segundoResultado) {
            tarjetasDestapadas = 0;

            //Incrementar aciertos
            aciertos++;
            document.getElementById('input2').innerHTML = aciertos;
            CorrectAudio.play();

            if (aciertos == 8) {
                var puntos = Puntos(movimientos);
                clearInterval(tiempoAtras);
          
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
            xhr.send("id_juego=" + <?php echo $id_juego; ?> + "&puntaje="+puntos + "&id_modulos=" + <?php echo $id_modulos; ?> + "&nombre_leccion='Seguridad personal'"+ "&puntajeInicial=" + <?php echo $puntajeInicial; ?>);


                winAudio.play();
                Swal.fire({
                title: '&iexcl;Lo lograste!<br><span class="footer">Has completado este juego y has desbloqueado la siguiente lecci&#243;n.</span><br><span style="color:#5c905f;" class="footer">Puntuaci&#243;n: </span>'+puntos,
                padding: '1em',
                html: '<img class="ganar" src="../imagenes/perrito_bailando.gif" alt="" >',
                color: '#000000',
                backdrop: `rgba(0,0,123,0.4)`,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                stopKeydownPropagation: false,
                showCancelButton: false,
                confirmButtonColor: '#6294D5',
                cancelButtonText: '<a class="quitar" href="Juego17.php">Volver a jugar</a>',
                cancelButtonColor: '#F3F4AC',
                confirmButtonText: '<a class="quitar" href="leccion6-3.php"><b>Siguiente</center></b>'
            })
           //---BD----
          
            }

        } else {
            IncorrectAudio.play();
            //mostrar momentaneamente
            setTimeout(() => {
                Tarjeta1.innerHTML = ' ';
                Tarjeta2.innerHTML = ' ';
                Tarjeta1.disabled = false;
                Tarjeta2.disabled = false;
                tarjetasDestapadas = 0;

            },800); 
        }

    }

}

function Puntos(movimientos){
    var puntaje = 0;
    
    if (movimientos <= 15 ){
        puntaje = 100;
    }else if(movimientos <= 25){
        puntaje = 80;
    }else if(movimientos <= 35){
        puntaje = 60;
    }else if(movimientos <= 40){
        puntaje = 40;
    }else if(movimientos <= 45){
        puntaje = 20;
    }else if(movimientos > 50){
        puntaje = 10;
    }

    return puntaje;

}

</script>