<?php
    require "../Admin/funciones/comprobarSesion.php"; 
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../CSS/juego3.css">

   
    <title>Quiz Prevención de delitos</title>
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

       $sql = "SELECT * FROM lecciones WHERE nombre='Seguridad personal' AND desbloqueado = 1 AND modulos_id = $id_modulos"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_lecciones = $row["id"];
       } 

       // Verifico si existe ya un registro con esos datos
        $sql = "SELECT * FROM juegos WHERE nombre='Seguridad personal' AND tipo='quiz'  AND lecciones_id = $id_lecciones AND lecciones_modulos_id = $id_modulos";
        $res = $con->query($sql);
        $fila= mysqli_num_rows($res);

        while($row =$res->fetch_array()){
         $id_juego = $row["id"];
         $desbloqueado = $row["desbloqueado"];
        } 
        $fila= mysqli_num_rows($res);
        //echo "<script>alert('fila=$fila , desbloqueado=$desbloqueado, id_juego=$id_juego');</script>";
        if($fila == 0){
        $sql = "INSERT INTO juegos (nombre, tipo, desbloqueado, puntaje, lecciones_id, lecciones_modulos_id) VALUES ('Seguridad personal','quiz',0,0,$id_lecciones ,$id_modulos);";
        $res = $con->query($sql);
        }
    ?>
    <br><br><br>

<div class="content">
    <!-- Juego quizz Inicio-->
    <h1>¡Pon a prueba tus conocimientos!</h1>
    <div id="pantalla-inicial">
      <p class="leccion"> Modulo 6. Seguridad vial y prevención de delitos</p>
      
      <center><img src="../imagenes/Juego18.avif" alt="" class="InicioJ1"></center>
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

<!-- Pantalla final SÍ aprpbado -->
<div id="pantalla-finalAprobado">
  <h2> CORRECTAS: <span id="numCorrectasA" style="color:#fffb9d;">3</span></h2>
  <h2>INCORRECTAS: <span id="numIncorrectasA" style="color:#f0e0e0;">2</span></h2>
  <p id="PNP2"></p>
  <a href="leccion7-1.php"> <button class="btn" onclick="Siguiente()"> Siguiente</button> </a>
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
let Lose = new Audio('../audios/Lose.wav');
let Win = new Audio('../audios/win.wav');
let WinGame = new Audio('../audios/WinGame.wav');
let LoseGame = new Audio('../audios/Lose2.wav');

//en un arreglo se colocan las imágenes?
let imagenes = []

//en un arreglo se colocan las preguntas
let preguntas = [];

preguntas.push("Es más seguro caminar por...");
preguntas.push("¿Qué caminos NO debemos de frecuentar si caminamos solos?");
preguntas.push("¿Cuál es un comportamiento sospechoso?");
preguntas.push("¿Qué NO debemos de hacer si sentimos que algo no está bien?");
preguntas.push("Si puedes ver a tu alrededor, también es más fácil para los demás...");
preguntas.push("¿Qué información es indispensable decirle a un adulto antes de salir a un lugar?");
preguntas.push("¿Cuál de las opciones es una estrategía de prevención vista?");
preguntas.push("¿Cómo funcionan las alarmas personales?");
preguntas.push("¿Cómo funcionan los botones de pánico?");
preguntas.push("¿Qué actitudes NO debemos de tener al caminar en la calle?");

//arreglo que guarda la opción correcta
let correcta = [0,2,3,1,2,0,3,2,0,1];

//arreglo para opciones a mostrar 
let opciones = [];

//se carga en el arreglo opciones a mostrar en cada jugada
opciones.push(["Calles y zonas bien conocidas","Lugares solos","Callejones con poca luz","Fábricas"]);
opciones.push(["Calles bien iluminadas","Calles con mucha gente","Calles con poca gente","Calles seguras"]);
opciones.push(["Miradas insistentes","Seguir a alguien sin razón","Intentar acercarse extrañamente","Todas las anteriores"]);
opciones.push(["Alejarse del peligro","Alterarse y entrar en pánico","Buscar ayuda","LLamar a emergencias"]);
opciones.push(["Ver caricaturas","Cruzar la calle","Poder verte a tí","Poder moverse"]);
opciones.push(["Por dónde y cómo llegarás","La música que te gusta","Qué desayunaste","La hora y el tiempo"]);
opciones.push(["Mantenerse visible","Elegir rutas seguras","Tratar de ir acompañado","Todas las anteriores"]);
opciones.push(["Alertan a emergencias","Alertan a tus papás","Generan un sonido fuerte","Generan música"]);
opciones.push(["Alertan a emergencias","Alertan a tus papás","Generan un sonido fuerte","Generan música"]);
opciones.push(["Prestar atención al entorno","Distraerse con el celular","Caminar con confianza","Todas las anteriores"]);

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

function revisarpuntaje(){
    if(aciertos >= 6){
       WinGame.play();
       var puntos = Puntos(aciertos);

       //---BD----
       // --- Llamada AJAX para actualizar la base de datos ---
       var xhr = new XMLHttpRequest();
       xhr.open("POST", "../Admin/funciones/actualizar_Juego.php", true);
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.onreadystatechange = function () {
         if (xhr.readyState === 4) {
             if (xhr.status === 200) {
                console.log("Respuesta del servidor: ", xhr.responseText); // Verifica la respuesta del servidor

                var xhr2 = new XMLHttpRequest();
                    xhr2.open("POST", "../Admin/funciones/desbloqueoLogros.php", true);
                    xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr2.onreadystatechange = function () {
                        if (xhr2.readyState === 4) {
                            if (xhr2.status === 200) {
                              console.log("Respuesta de la segunda consulta: ", xhr2.responseText);

                              if(puntos === 100) {
                                // Aquí puedes realizar la segunda consulta
                                var xhr3 = new XMLHttpRequest();
                                xhr3.open("POST", "../Admin/funciones/desbloqueoLogros.php", true);
                                xhr3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhr3.onreadystatechange = function () {
                                    if (xhr3.readyState === 4) {
                                        if (xhr3.status === 200) {
                                            console.log("Respuesta de la tercera consulta: ", xhr3.responseText);
                                        } else {
                                            console.error("Error en la tercera consulta: ", xhr3.statusText);
                                        }
                                    }
                                };
                                xhr3.send("nombre='Conciencia de seguridad personal'&id_usuario=" + <?php echo $id_usuario; ?> + "&puntos=" + puntos); 
                            }
                            } else {
                              console.error("Error en la segunda consulta: ", xhr2.statusText);
                            }
                        }
                    };
                    xhr2.send("nombre='La seguridad lo es todo'&id_usuario=" + <?php echo $id_usuario; ?>);
             } else {
                console.error("Error: ", xhr.statusText); // Si hay un error, lo mostramos
             }
         }
       };
       console.log("Enviando petición AJAX");
       xhr.send("id_juego=" + <?php echo $id_juego; ?> + "&puntaje="+puntos + "&id_modulos=" + <?php echo $id_modulos; ?> + "&nombre_leccion='Respuestas en casos de emergencia'" + "&nombre_modulo='Disuacion de delitos'" + "&id_usuario=" + <?php echo $id_usuario; ?>);


       //se activa la página de final de Juego
       document.getElementById("pantalla-juego").style.display = "none";
       document.getElementById("pantalla-finalAprobado").style.display = "block";

       //se agregan los resultados
       document.getElementById("numCorrectasA").innerHTML = aciertos;
       document.getElementById("numIncorrectasA").innerHTML = preguntas.length - aciertos;
       document.getElementById("PNP2").className = "pasa";
       document.getElementById("PNP2").innerHTML = "&#161;Has logrado aprobar&#33; 🤩";
       //aqui iria alguna función para desbloquear la siguiente función, ya que logro pasar
    }else{
       LoseGame.play();
       //se activa la página de final de Juego
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

function Puntos(aciertos){
    var puntaje = aciertos * 10;

    return puntaje;
}

</script>