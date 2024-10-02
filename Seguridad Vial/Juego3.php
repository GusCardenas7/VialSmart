<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../CSS/juego3.css">

   
    <title>Quiz Introduccion a la seguridad vial</title>
</head>

<body>
<!-- MENU -->
    <?php 
        include '../funciones/menu_sec.php'; 
    ?>
    <br><br><br>

<div class="content">
    <!-- Juego quizz Inicio-->
    <h1>¡Pon a prueba tus conocimientos!</h1>
    <div id="pantalla-inicial">
      <p class="leccion"> Modulo 1. Introducci&#243;n a la seguridad vial</p>
      
      <center><img src="../imagenes/InicioJ1.jpg" alt="" class="InicioJ1"></center>
      <br> <button class="btn" onclick="comenzarJuego()"> COMENZAR A JUGAR</button> 
    </div>
    <!-- Pantalla Juego -->
    <div class="´pantalla-juego" id="pantalla-juego">
      <p class="Preguntas" id="pregunta"> <b>Pregunta</b> </p>
      <center><img src="../imagenes/J1seguridad.png" alt="" id="J1seguridad"></center>
      <div class="opciones"> 
        <div class="opcion" id="op0" onclick="comprobarRespuesta(0)"> 
          <div class="letra" id="l0">A</div>
          <div class="nombre font" id="n0">OPCION A</div>
        </div>
        <div class="opcion" id="op1" onclick="comprobarRespuesta(1)"> 
          <div class="letra" id="l1">B</div>
          <div class="nombre font" id="n1">OPCION B</div>
        </div>
        <div class="opcion" id="op2" onclick="comprobarRespuesta(2)"> 
          <div class="letra" id="l2">C</div>
          <div class="nombre font" id="n2">OPCION C</div>
        </div>
        <div class="opcion" id="op3" onclick="comprobarRespuesta(3)"> 
          <div class="letra" id="l3">D</div>
          <div class="nombre font" id="n3">OPCION D</div>
        </div>
      </div>
    </div>
    <!-- Pantalla final No aprobado-->
    <div id="pantalla-final">
      <h2> CORRECTAS: <span id="numCorrectas" style="color:#fffb9d;">3</span></h2>
      <h2>INCORRECTAS: <span id="numIncorrectas" style="color:#f0e0e0;">2</span></h2>
      <p id="PNP"></p>
      <button class="btn" onclick="volverAlInicio()"> VOLVER AL INICIO</button>
    </div>

    <!-- Pantalla final SÍ aprpbado -->
    <div id="pantalla-finalAprobado">
      <h2> CORRECTAS: <span id="numCorrectasA" style="color:#fffb9d;">3</span></h2>
      <h2>INCORRECTAS: <span id="numIncorrectasA" style="color:#f0e0e0;">2</span></h2>
      <p id="PNP"></p>
      <a href="leccion2-1.php"> <button class="btn" onclick="Siguiente()"> Siguiente</button> </a>
    </div>
</div>

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

<script>

//Audios
let Click = new Audio('../audios/click.wav');
let Lose = new Audio('../audios/lose.wav');
let Win = new Audio('../audios/win.wav');
let WinGame = new Audio('../audios/WinGame.wav');
let LoseGame = new Audio('../audios/Lose2.wav');

//en un arreglo se colocan las imágenes?
let imagenes = []

//en un arreglo se colocan las preguntas
let preguntas = [];

preguntas.push("&#191;Cu&#225;l de los siguientes S&#237; es un objetivo de la seguridad v&#237;al?");
preguntas.push("&#191;Cu&#225;l de las siguientes opciones NO deben de hacer los peatones?");
preguntas.push("Es recomendable que los ciclistas vayan por...");
preguntas.push("&#191;Cu&#225;les son los elementos de la v&#237;a p&#250;blica?");
preguntas.push("&#191;Qui&#233;nes deben de usar la acera?");
preguntas.push("Las líneas blancas que se encuentran marcadas en las calles o avenidas son:");
preguntas.push("¿Cuál elemento víal nos indican cuándo cruzar o parar?");
preguntas.push("Cuando vamos caminando por la calle somos...");
preguntas.push("¿Qué NO se debe hacer cuando somos pasajeros?");
preguntas.push("La seguridad víal es el conjunto de reglas y prácticas que nos ayudan cuando usamos...");

//arreglo que guarda la opción correcta
let correcta = [0,3,0,3,1,2,0,1,2,3];

//arreglo para opciones a mostrar 
let opciones = [];

//se carga en el arreglo opciones a mostrar en cada jugada
opciones.push(["Prevenir accidentes", "Promover la venta de vehiculos", "Fomentar las carreras de vehiculos", "Aumentar la congesti&#243;n vehicular"]);
opciones.push(["Caminar por la acera", "Estar atentos", "Cruzar por los pasos peatonales", "Distraerse con el celular"]);
opciones.push(["ciclov&#237;as","aceras", "calles", "autopistas"]);
opciones.push(["Señales de tr&#225;nsito", "Bancos y papeleras", "Sem&#225;foros", "Todos los anteriores"]);
opciones.push(["Bicicletas", "Peatones", "Camiones", "Autos"]);
opciones.push(["zonas de estacionamiento", "límites de velocidad", "cruces peatonales", "pinturas"]);
opciones.push(["Semáforos", "Nuestra mamá", "Ciclovías", "Camiones"]);
opciones.push(["conductores", "peatones", "ciclistas", "pasajeros"]);
opciones.push(["Usar el cinturón de seguridad", "Sentarse correctamente", "Distraer al conductor", "Todas las anteriores"]);
opciones.push(["calles y carreteras", "vehículos", "bicicletas o patinetas", "Todas las anteriores"]);

//variable que guarda la posición actual
let posicion = 0;
let aciertos = 0;
function comenzarJuego(){
    Click.play();
  //variable que guarda la cantidad acertadas hasta el momento
    posicion = 0;
    aciertos = 0;
    //se activan las pantallas necesarias
    document.getElementById("pantalla-inicial").style.display = "none"
    document.getElementById("pantalla-juego").style.display = "block"
    cargarPregunta();
}
function cargarPregunta(){
    if (preguntas.length <= posicion){
        revisarpuntaje();
    }
    else{
       //limpiamos las clases que se asignaron
       limpiarOpciones();
       document.getElementById("pregunta").innerHTML = preguntas[posicion];
       document.getElementById("n0").innerHTML = opciones[posicion][0];
       document.getElementById("n1").innerHTML = opciones[posicion][1];
       document.getElementById("n2").innerHTML = opciones[posicion][2];
       document.getElementById("n3").innerHTML = opciones[posicion][3];
    }
}

function limpiarOpciones(){
       document.getElementById("n0").className="nombre font";
       document.getElementById("n1").className="nombre font";
       document.getElementById("n2").className="nombre font";
       document.getElementById("n3").className="nombre font";

       document.getElementById("l0").className="letra";
       document.getElementById("l1").className="letra";
       document.getElementById("l2").className="letra";
       document.getElementById("l3").className="letra";
}

function comprobarRespuesta(opcionElegida){
    if(opcionElegida==correcta[posicion]){ //si acerto
         Win.play();
        //se agregan las clases para colocar el color verde del css
        document.getElementById("n"+opcionElegida).className = "nombre nombreAcertada";
        document.getElementById("l"+opcionElegida).className = "letra letraAcertada";
        aciertos++;
    }
    else{ // si no acerto
        Lose.play();
        //se agrega el css de incorrectas
        document.getElementById("n"+opcionElegida).className = "nombre nombreIncorrecta";
        document.getElementById("l"+opcionElegida).className = "letra letraIncorrecta"; 
        
        //opcion correcta
        document.getElementById("n"+correcta[posicion]).className = "nombre nombreAcertada"; 
        document.getElementById("l"+correcta[posicion]).className = "letra letraAcertada"; 
    }   
    posicion++;
    //damos 1 segundo para pasar a la siguiente pregunta.
    setTimeout(cargarPregunta,1000);
}
/*
function terminarJuego(){
    //se activa la página de final de Juego
    document.getElementById("pantalla-juego").style.display = "none";
    document.getElementById("pantalla-final").style.display = "block";

    //se agregan los resultados
    document.getElementById("numCorrectas").innerHTML = aciertos;
    document.getElementById("numIncorrectas").innerHTML = preguntas.length - aciertos;

    revisarpuntaje();
}*/

function revisarpuntaje(){
    if(aciertos >= 6){
       WinGame.play();
       //se activa la página de final de Juego
       document.getElementById("pantalla-juego").style.display = "none";
       document.getElementById("pantalla-finalAprobado").style.display = "block";

       //se agregan los resultados
       document.getElementById("numCorrectasA").innerHTML = aciertos;
       document.getElementById("numIncorrectasA").innerHTML = preguntas.length - aciertos;
       document.getElementById("PNP").className = "pasa";
       document.getElementById("PNP").innerHTML = "&#161;Has logrado aprobar&#33; 🤩";
       //aqui iria alguna función para desbloquear la siguiente función, ya que logro pasar
    }else{
       LoseGame.play();
       document.getElementById("pantalla-juego").style.display = "none";
       document.getElementById("pantalla-final").style.display = "block";

       //se agregan los resultados
       document.getElementById("numCorrectas").innerHTML = aciertos;
       document.getElementById("numIncorrectas").innerHTML = preguntas.length - aciertos;
       document.getElementById("PNP").className = "Nopasa";
       document.getElementById("PNP").innerHTML = "&#161;No has obtenido los puntos suficientes&#33; 😱";
    }
}

function volverAlInicio(){
    Click.play();
    document.getElementById("pantalla-final").style.display = "none";
    document.getElementById("pantalla-inicial").style.display = "block";
    document.getElementById("pantalla-juego").style.display = "none";  
}

</script>