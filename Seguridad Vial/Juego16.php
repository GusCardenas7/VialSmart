<?php
    require "../Admin/funciones/comprobarSesion.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../CSS/Union.css"> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title> Union Lección 6.1 </title>
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

       $sql = "SELECT * FROM lecciones WHERE nombre='Identificacion de situaciones de riesgo' AND desbloqueado = 1 AND modulos_id = $id_modulos"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_lecciones = $row["id"];
       } 

       // Verifico si existe ya un registro con esos datos
        $sql = "SELECT * FROM juegos WHERE nombre='Identificacion de situaciones de riesgo' AND tipo='DragAndDrop'  AND lecciones_id = $id_lecciones AND lecciones_modulos_id = $id_modulos";
        $res = $con->query($sql);
        $fila= mysqli_num_rows($res);

        while($row =$res->fetch_array()){
         $id_juego = $row["id"];
         $desbloqueado = $row["desbloqueado"];
        } 
        $fila= mysqli_num_rows($res);
        //echo "<script>alert('fila=$fila , desbloqueado=$desbloqueado, id_juego=$id_juego');</script>";
        if($fila == 0){
        $sql = "INSERT INTO juegos (nombre, tipo, desbloqueado, puntaje, lecciones_id, lecciones_modulos_id) VALUES ('Identificacion de situaciones de riesgo','DragAndDrop',0,0,$id_lecciones ,$id_modulos);";
        $res = $con->query($sql);
        }

    ?>
    <br><br><br>


<!-- Juego -->
<br>
<h2><center>➖ Arrastra la imágen y colócala en su lugar correspondiente ➖</center> </h2> 
<h2 style="color:#247d47;"> <center> ¡Tú puedes! </center></h2>
<br>
  <section class="score">
    <span class="correct">0</span>/<span class="total">0</span>
    <button id="play-again-btn">Play Again</button>
  </section>
  <section class="draggable-items">
  </section>
  <section class="matching-pairs">
  </section>
</body>
 <footer>
        <div class="links">
            <a href="">Términos y condiciones</a>
            <a href="">Política de privacidad</a>
            <a href="../contacto_formulario.php">Contáctanos</a>
        </div>
        <span class="copyright">&copy; VialSmart 2024</span>
  </footer>

</html>

<script>
const brands = [
  {
    imagePath: "../imagenes/Union/Leccion16/ZonasLuminadas.png", 
    signalName: "Ir por zonas bien iluminadas"
  },
  {
    imagePath: "../imagenes/Union/Leccion16/EstarAtento.png", 
    signalName: "Estar atento a las señales de alerta"
  },
  {
    imagePath: "../imagenes/Union/Leccion16/Alejarse.png", 
    signalName: "Alejáte de las personas sospechosas"
  },
  {
    imagePath: "../imagenes/Union/Leccion16/Seguir.png", 
    signalName: "Seguirte sin razón es un comportamiento sospechoso"
  },
  {
    imagePath: "../imagenes/Union/Leccion16/Adulto.png", 
    signalName: "Busca a un adulto de confianza"
  },
  {
    imagePath: "../imagenes/Union/Leccion16/911.png", 
    signalName: "Puedes llamar al 911"
  }
];
let winAudio = new Audio('../audios/WinGame.wav');
let LoseAudio = new Audio('../audios/Lose2.wav');
let ClickAudio = new Audio('../audios/Click2.wav');
let CorrectAudio = new Audio('../audios/right.wav');
let IncorrectAudio = new Audio('../audios/TimeOut.wav');

let correct = 0;
let total = 0;
const totalDraggableItems = 5;
const totalMatchingPairs = 5; // Should be <= totalDraggableItems
let failedAttempts = 0; // Contador de intentos fallidos

const scoreSection = document.querySelector(".score");
const correctSpan = scoreSection.querySelector(".correct");
const totalSpan = scoreSection.querySelector(".total");
const playAgainBtn = scoreSection.querySelector("#play-again-btn");

const draggableItems = document.querySelector(".draggable-items");
const matchingPairs = document.querySelector(".matching-pairs");
let draggableElements;
let droppableElements;

var puntaje = 100;

initiateGame();

function initiateGame() {
  const randomDraggableBrands = generateRandomItemsArray(totalDraggableItems, brands);
  const randomDroppableBrands = totalMatchingPairs<totalDraggableItems ? generateRandomItemsArray(totalMatchingPairs, randomDraggableBrands) : randomDraggableBrands;
  const alphabeticallySortedRandomDroppableBrands = [...randomDroppableBrands].sort((a,b) => a.signalName.toLowerCase().localeCompare(b.signalName.toLowerCase()));
  
  // Create "draggable-items" and append to DOM
  for(let i=0; i<randomDraggableBrands.length; i++) {
    draggableItems.insertAdjacentHTML("beforeend", `
      <img src="${randomDraggableBrands[i].imagePath}" class="draggable" draggable="true" id="${randomDraggableBrands[i].signalName}" alt="${randomDraggableBrands[i].signalName}">
    `);
  }
  
  // Create "matching-pairs" and append to DOM
  for(let i=0; i<alphabeticallySortedRandomDroppableBrands.length; i++) {
    matchingPairs.insertAdjacentHTML("beforeend", `
      <div class="matching-pair">
        <span class="label">${alphabeticallySortedRandomDroppableBrands[i].signalName}</span>
        <span class="droppable" data-brand="${alphabeticallySortedRandomDroppableBrands[i].signalName}"></span>
    </div>
    `);
  }
  
  draggableElements = document.querySelectorAll(".draggable");
  droppableElements = document.querySelectorAll(".droppable");
  
  draggableElements.forEach(elem => {
    elem.addEventListener("dragstart", dragStart);
    // elem.addEventListener("drag", drag);
    // elem.addEventListener("dragend", dragEnd);
  });
  
  droppableElements.forEach(elem => {
    elem.addEventListener("dragenter", dragEnter);
    elem.addEventListener("dragover", dragOver);
    elem.addEventListener("dragleave", dragLeave);
    elem.addEventListener("drop", drop);
  });
}

// Drag and Drop Functions

//Events fired on the drag target

function dragStart(event) {
  event.dataTransfer.setData("text", event.target.id); // or "text/plain"
}

//Events fired on the drop target

function dragEnter(event) {
  if(event.target.classList && event.target.classList.contains("droppable") && !event.target.classList.contains("dropped")) {
    event.target.classList.add("droppable-hover");
  }
}

function dragOver(event) {
  if(event.target.classList && event.target.classList.contains("droppable") && !event.target.classList.contains("dropped")) {
    event.preventDefault();
  }
}

function dragLeave(event) {
  if(event.target.classList && event.target.classList.contains("droppable") && !event.target.classList.contains("dropped")) {
    event.target.classList.remove("droppable-hover");
  }
}

function drop(event) {
  event.preventDefault();
  event.target.classList.remove("droppable-hover");
  const draggableElementSignal = event.dataTransfer.getData("text");
  const droppableElementSignal = event.target.getAttribute("data-brand");
  const isCorrectMatching = draggableElementSignal === droppableElementSignal;
  total++;
  if(isCorrectMatching) {
    CorrectAudio.play();
    const draggableElement = document.getElementById(draggableElementSignal);
    event.target.classList.add("dropped");
    draggableElement.classList.add("dragged");
    draggableElement.setAttribute("draggable", "false");
    event.target.innerHTML = `<img src="${draggableElement.src}" alt="${draggableElementSignal}">`;
    correct++;  
    if (correct === Math.min(totalMatchingPairs, totalDraggableItems)) {
    //alert("¡Felicidades! Has ganado el juego.");
       winAudio.play();

       //---BD----
            // --- Llamada AJAX para actualizar la base de datos ---
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Admin/funciones/actualizar_Juegos.php", true);
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
                            } else {
                                console.error("Error en la segunda consulta: ", xhr2.statusText);
                            }
                        }
                    };
                    xhr2.send("nombre='Detector de riesgos'&id_usuario=" + <?php echo $id_usuario; ?> + "&puntos=" + puntaje);
                  } else {
                   console.error("Error: ", xhr.statusText); // Si hay un error, lo mostramos
                  }
                }
            };
            console.log("Enviando petición AJAX");
            xhr.send("id_juego=" + <?php echo $id_juego; ?> + "&puntaje="+puntaje + "&id_modulos=" + <?php echo $id_modulos; ?> + "&nombre_leccion='Estrategias de prevencion'");


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
                cancelButtonText: '<a class="quitar" href="Juego16.php">Volver a jugar</a>',
                cancelButtonColor: '#F3F4AC',
                confirmButtonText: '<a class="quitar" href="leccion6-2.php"><b>Siguiente</center></b>'
                 })
    } 
  }else{failedAttempts++; // Incrementar el contador de intentos fallidos
    puntaje = puntaje  -  25;  
    IncorrectAudio.play();
    if (failedAttempts === 5) { // Si se alcanzan 10 intentos fallidos
        //alert("Has perdido. Inténtalo de nuevo.");
        LoseAudio.play();
        Swal.fire({
                title: '<span class="titulo"> &iexcl;No lo lograste!</span><br><span class="footer">Vuelve  a jugar para lograr desbloquear la siguiente lecci&#243;n.</span>',
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
                cancelButtonText: '<a class="quitar" href="Juego16.php">Volver a jugar</a>',
                cancelButtonColor: '#C1BDBC',
                confirmButtonText: '<a class="quitar" href="IndexSV.php">P&#225;gina principal</a>'
            })
      playAgainBtn.style.display = "block";
      setTimeout(() => {
        playAgainBtn.classList.add("play-again-btn-entrance");
      }, 200);
      return; // Detener el juego
    }}


  scoreSection.style.opacity = 0;
  setTimeout(() => {
    correctSpan.textContent = correct;
    totalSpan.textContent = total;
    scoreSection.style.opacity = 1;
  }, 200);
  if(correct===Math.min(totalMatchingPairs, totalDraggableItems)) { 
    playAgainBtn.style.display = "block";
    setTimeout(() => {
      playAgainBtn.classList.add("play-again-btn-entrance");
    }, 200);
  }
}

// Other Event Listeners
playAgainBtn.addEventListener("click", playAgainBtnClick);
function playAgainBtnClick() {
  playAgainBtn.classList.remove("play-again-btn-entrance");
  correct = 0;
  total = 0;
  draggableItems.style.opacity = 0;
  matchingPairs.style.opacity = 0;
  setTimeout(() => {
    scoreSection.style.opacity = 0;
  }, 100);
  setTimeout(() => {
    playAgainBtn.style.display = "none";
    while (draggableItems.firstChild) draggableItems.removeChild(draggableItems.firstChild);
    while (matchingPairs.firstChild) matchingPairs.removeChild(matchingPairs.firstChild);
    initiateGame();
    correctSpan.textContent = correct;
    totalSpan.textContent = total;
    draggableItems.style.opacity = 1;
    matchingPairs.style.opacity = 1;
    scoreSection.style.opacity = 1;
  }, 500);
}

// Auxiliary functions
function generateRandomItemsArray(n, originalArray) {
  let res = [];
  let clonedArray = [...originalArray];
  if(n>clonedArray.length) n=clonedArray.length;
  for(let i=1; i<=n; i++) {
    const randomIndex = Math.floor(Math.random()*clonedArray.length);
    res.push(clonedArray[randomIndex]);
    clonedArray.splice(randomIndex, 1);
  }
  return res;
}

</script>