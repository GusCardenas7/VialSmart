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
                cancelButtonText: '<a class="quitar" href="Juego13.php">Volver a jugar</a>',
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
        tarjetaBloqueada.innerHTML = `<img src="../imagenes/memoramas/Leccion5/${piezas[i]}.jpg" alt="">`;
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

            Swal.fire({
                title: '&iexcl;Lo lograste!<br><span class="footer">Has completado este juego y has desbloqueado la siguiente lecci&#243;n.</span>',
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
                cancelButtonText: '<a class="quitar" href="leccion5-2.php">Volver a jugar</a>',
                cancelButtonColor: '#F3F4AC',
                confirmButtonText: '<a class="quitar" href="videos.php">Ir a lecciones</a>'
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

        document.getElementById(casilla).src = "../imagenes/memoramas/Leccion5/" + imagen + ".jpg";
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

var num_click = 0;
var casilla1;

desordenar();
CambiarPiezas();