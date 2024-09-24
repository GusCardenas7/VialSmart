<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../CSS/Juego2.css">
    <!-- <script src="main.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title> Memorama Lección 1.2 </title>

</head>

<body>

    <!-- MENU -->
    <?php 
        include '../funciones/menu_sec.php'; 
    ?>
    <br><br><br>

    <!-- Juego -->
    <h1 style="color:#000000;">🚥 Usuarios de la via 🚥</h1>
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
            <a href="">Términos y condiciones</a>
            <a href="">Política de privacidad</a>
            <a href="../contacto_formulario.php">Contáctanos</a>
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
let timer = 30;
let tiempoAtras = null;

let winAudio = new Audio('../audios/WinGame.wav');
let LoseAudio = new Audio('../audios/Lose2.wav');
let CorrectAudio = new Audio('../audios/right.wav');
let IncorrectAudio = new Audio('../audios/TimeOut.wav');
let ClickAudio = new Audio('../audios/Click2.wav');



//html
//let mostrarmovimientos = document.getElementById('movimientos');
//let mostrarTiempo = document.getElementById('t-restante');

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
                cancelButtonText: '<a class="quitar" href="Juego2.php">Volver a jugar</a>',
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
        tarjetaBloqueada.innerHTML = `<img src="../imagenes/Puzzle/Leccion1/${numeros[i]}.png" alt="">`;
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
        Tarjeta1.innerHTML = `<img src="../imagenes/Puzzle/Leccion1/${primerResultado}.png" alt="">`;
        ClickAudio.play();

        Tarjeta1.disabled = true;

    } else if (tarjetasDestapadas == 2) {
        Tarjeta2 = document.getElementById(id);
        segundoResultado = numeros[id];
        //Tarjeta2.innerHTML = segundoResultado;
        Tarjeta2.innerHTML = `<img src="../imagenes/Puzzle/Leccion1/${segundoResultado}.png" alt="">`;

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
                clearInterval(tiempoAtras);
          
                winAudio.play();
                Swal.fire({
                title: '&iexcl;Lo lograste!<br><span class="footer">Has completado este juego y has desbloqueado la siguiente lecci&#243;n.</span>',
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
                cancelButtonText: '<a class="quitar" href="lecciones.php">Ir a lecciones</a>',
                cancelButtonColor: '#F3F4AC',
                confirmButtonText: '<a class="quitar" href="leccion1-3.php"><b>Siguiente</center></b>'
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

</script>
