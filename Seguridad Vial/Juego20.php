﻿<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../CSS/juego3.css">

   
    <title>Quiz Disuación de delitos</title>
</head>

<body>
<!-- MENU -->
    <?php 
        include '../funciones/menu.php'; 
    ?>
    <br><br><br>

<!-- Juego quizz Inicio-->
<h1>&#33;Pon a prueba tus conocimientos!</h1>
<div id="pantalla-inicial">
  <p class="leccion"> Modulo 7. Disuación de delitos</p>
  
  <center><img src="../imagenes/Juego20.webp" alt="" class="InicioJ1"></center>
  <br> <button class="btn" onclick="comenzarJuego()"> COMENZAR A JUGAR</button> 
</div>
<!-- Pantalla Juego -->
<div class="´pantalla-juego" id="pantalla-juego">
  <p class="Preguntas" id="pregunta"> <b>Pregunta</b> </p>
  <center><img src="../imagenes/Juego18.5.avif" alt="" id="J1seguridad"></center>
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
<!-- Pantalla final -->
<div id="pantalla-final">
  <h2> CORRECTAS: <span id="numCorrectas" style="color:#fffb9d;">3</span></h2>
  <h2>INCORRECTAS: <span id="numIncorrectas" style="color:#f0e0e0;">2</span></h2>
  <p id="PNP"></p>
  <button class="btn" onclick="volverAlInicio()"> VOLVER AL INICIO</button>
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
let Lose = new Audio('../audios/Lose.wav');
let Win = new Audio('../audios/win.wav');

//en un arreglo se colocan las imágenes?
let imagenes = []

//en un arreglo se colocan las preguntas
let preguntas = [];

preguntas.push("Ante un secuestro, ¿qué se debe de hacer?");
preguntas.push("Ante un acoso, ¿qué es lo que NO debemos de hacer?");
preguntas.push("¿Qué se debe de hacer si un extraño te ofrece algo?");
preguntas.push("¿Qué hacemos si un extraño te hace sentir incómodo?");
preguntas.push("¿Con quién puedes acudir si te sientes en peligro?");


//arreglo que guarda la opción correcta
let correcta = [3,2,0,0,3];

//arreglo para opciones a mostrar 
let opciones = [];

//se carga en el arreglo opciones a mostrar en cada jugada
opciones.push(["Mantener la calma","No luchar o enfrentarse","Buscar ayuda","Todas las anteriores"]);
opciones.push(["Alejarse de esa persona","Buscar ayuda","Confrontar a la persona","Apretar un botón de pánico"]);
opciones.push(["Decir “no, gracias”","Aceptarlo","Mirar feo a la persona","Correr"]);
opciones.push(["Alejarse rápidamente","Escuchar música","Alterarse","Seguir charlando"]);
opciones.push(["Policía","Maestro","Familiar","Todas las anteriores"]);

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
        terminarJuego();
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

function terminarJuego(){
    //se activa la página de final de Juego
    document.getElementById("pantalla-juego").style.display = "none";
    document.getElementById("pantalla-final").style.display = "block";

    //se agregan los resultados
    document.getElementById("numCorrectas").innerHTML = aciertos;
    document.getElementById("numIncorrectas").innerHTML = preguntas.length - aciertos;

    revisarpuntaje();
}

function revisarpuntaje(){
    if(aciertos == 5){
       Win.play();
       document.getElementById("PNP").className = "pasa";
       document.getElementById("PNP").innerHTML = "&#161;Has logrado aprobar&#33; 🤩";
       //aqui iria alguna función para desbloquear la siguiente función, ya que logro pasar
    }else{
       Lose.play();
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