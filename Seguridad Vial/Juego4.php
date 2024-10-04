<?php
    require "../Admin/funciones/comprobarSesion.php";
   
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../CSS/Adivina.css"> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title> Adivinanza Lección 2.1 </title>
</head>

<body>
 <!-- MENU -->
    <?php 
        include '../funciones/menu_sec.php'; 

        // Parte dónde se revisa si ya se ha desbloqueado antes o no
        require "../Admin/funciones/conecta.php";   
        $con = conecta();
        $id_usuario = $_SESSION['idU'];
       
       //checar el id de lecciones y modulos
       $sql = "SELECT * FROM modulos WHERE nombre='Señales de transito' AND usuarios_id = $id_usuario"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_modulos = $row["id"];
       } 

       $sql = "SELECT * FROM lecciones WHERE nombre='Tipos de señales de transito' AND desbloqueado = 1 AND modulos_id = $id_modulos"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_lecciones = $row["id"];
       } 

       // Verifico si existe ya un registro con esos datos
        $sql = "SELECT * FROM juegos WHERE nombre='Tipos de señales de transito' AND tipo='adivinanza'  AND lecciones_id = $id_lecciones AND lecciones_modulos_id = $id_modulos";
        $res = $con->query($sql);
        $fila= mysqli_num_rows($res);

        while($row =$res->fetch_array()){
         $id_juego = $row["id"];
         $desbloqueado = $row["desbloqueado"];
        } 
        $fila= mysqli_num_rows($res);
        //echo "<script>alert('fila=$fila , desbloqueado=$desbloqueado, id_juego=$id_juego');</script>";
        if($fila == 0){
        $sql = "INSERT INTO juegos (nombre, tipo, desbloqueado, puntaje, lecciones_id, lecciones_modulos_id) VALUES ('Tipos de señales de transito','adivinanza',0,0,$id_lecciones ,$id_modulos);";
        $res = $con->query($sql);
        }

    ?>
    <br><br><br>


<!-- Juego -->
<div>
   <section class="section1">
        <h2>Adivina la Palabra</h2>
        <div id="palabra">
            <div class="letra pintar">G</div>
            <div class="letra">U</div>
            <div class="letra">I</div>
            <div class="letra">T</div>
            <div class="letra">A</div>
            <div class="letra">R</div>
            <div class="letra">R</div>
            <div class="letra">A</div>
        </div>
        <h3>Ayuda: <span id="ayuda"> Instrumento Musical</span> </h3>
        <h3>Intentos restantes: <span id="intentos">5</span></h3>
        <h3>Letras ingresadas: <span id="letrasIngresadas"></span></h3>

       <!-- <button onclick="cargarNuevaPalabra()">Nueva Palabra</button> -->
    </section>   
    <div class="decoracion2"> <img style="width:20%;" src="../imagenes/Adivinanza/concurso.png" alt=""> </div>
    <div class="decoracion3"> <img style="width:15%;" src="../imagenes/Adivinanza/buscar.png" alt=""> </div>
</div>

</body>
  <footer>
  <div class="decoracion4"> <img style="width:20%;" src="../imagenes/Adivinanza/problema.png" alt=""> </div>
        <div class="links">
            <a href="">Términos y condiciones</a>
            <a href="">Política de privacidad</a>
            <a href="../contacto_formulario.php">Contáctanos</a>
        </div>
        <span class="copyright">&copy; VialSmart 2024</span>
  </footer>

</html>

<script>

let winAudio = new Audio('../audios/WinGame.wav');
let LoseAudio = new Audio('../audios/Lose2.wav');
let LoseA = new Audio('../audios/lose.wav');
let CorrectAudio = new Audio('../audios/right.wav');
let IncorrectAudio = new Audio('../audios/TimeOut.wav');
let ClickAudio = new Audio('../audios/Click2.wav');

let arrayPalabras =["VERTICAL", "AMARILLO", "RESTRICTIVAS", "AZUL", "ROJO", "HORIZONTAL"];
let ayudas = [
    "Tipo de señal que se coloca en postes al lado de la carretera",
    "Color de las señales preventivas",
    "Tipo de señal que indica restricciones",
    "Color de las señales informativas",
    "Color de las señales restictivas",
    "Tipo de señal al que pertecen los cruces peatonales"
]

let cantPalabrasJugadas = 0;
let intentosRestantes = 5;
let posActual;
let arrayPalabraActual = [];
let cantidadAcertadas = 0;
let divsPalabraActual = [];
let totalQueDebeAcertar;

let TotalAciertos = 0;

function cargarNuevaPalabra(){
    //Aumento en uno cantidad de palabras jugadas y controlo si llego a su limite
    
    //Se evalua si se pasa a la siguiente lección o no
    cantPalabrasJugadas++;
    if(cantPalabrasJugadas>6){
        if(TotalAciertos>=4){
            //alert("felicidades");
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
                  } else {
                   console.error("Error: ", xhr.statusText); // Si hay un error, lo mostramos
                  }
                }
            };
            console.log("Enviando petición AJAX");
            xhr.send("id_juego=" + <?php echo $id_juego; ?> + "&puntaje=40" + "&id_modulos=" + <?php echo $id_modulos; ?> + "&nombre_leccion='Señales de transito mas comunes'");

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
                confirmButtonText: '<a class="quitar" href="leccion2-2.php"><b>Siguiente</center></b>'
            })
           //-------
        }else{
            //alert("ni modo");
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
                cancelButtonText: '<a class="quitar" href="Juego4.php">Volver a jugar</a>',
                cancelButtonColor: '#C1BDBC',
                confirmButtonText: '<a class="quitar" href="IndexSV.php">P&#225;gina principal</a>'
            })
        }
    }

    //Selecciono una posicion random
    posActual = Math.floor(Math.random()*arrayPalabras.length);

    let palabra = arrayPalabras[posActual];
    totalQueDebeAcertar = palabra.length;
    cantidadAcertadas = 0;

    //Guardamos la palabra que esta en formato string en un arreglo
    arrayPalabraActual = palabra.split('');

    //limpiamos los contenedores que quedaron cargadas con la palabra anterior
    document.getElementById("palabra").innerHTML = "";
    document.getElementById("letrasIngresadas").innerHTML = "";

    for(i=0;i<palabra.length;i++){
        var divLetra = document.createElement("div");
        divLetra.className = "letra";
        document.getElementById("palabra").appendChild(divLetra);
    }

    divsPalabraActual = document.getElementsByClassName("letra");

    intentosRestantes = 5;
    document.getElementById("intentos").innerHTML = intentosRestantes;
    document.getElementById("ayuda").innerHTML = ayudas[posActual];

   //elimino el elemento ya seleccionado del arreglo.
    arrayPalabras.splice(posActual,1);
    ayudas.splice(posActual,1);

}

cargarNuevaPalabra();

//Detecto la tecla que el usuario presion
document.addEventListener("keydown", event => {
    if(isLetter(event.key)){
        let letrasIngresadas = document.getElementById("letrasIngresadas").innerHTML;
        letrasIngresadas = letrasIngresadas.split('');
        
        if(letrasIngresadas.lastIndexOf(event.key.toUpperCase()) === -1){
            let acerto = false;

            //Recorro el arreglo que ocntiene la palabra para verificar si la palabra ingresada esta
            for(i=0;i<arrayPalabraActual.length;i++){
                if(arrayPalabraActual[i] == event.key.toUpperCase()){//acertó
                    divsPalabraActual[i].innerHTML = event.key.toUpperCase();
                    acerto = true;
                    cantidadAcertadas = cantidadAcertadas + 1;
                }
            }
        
            //Controlo si acerto al menos una letra
            if(acerto==true){
                //controlamos si ya acerto todas
                if(totalQueDebeAcertar == cantidadAcertadas){
                    TotalAciertos++;
                    
                    for(i=0;i<arrayPalabraActual.length;i++){
                        CorrectAudio.play();
                        divsPalabraActual[i].className="letra pintar";

                    }
                    setTimeout(cargarNuevaPalabra,1000);
                }
            }else{
                //No acerto, decremento los intentos restantes
                intentosRestantes = intentosRestantes - 1;
                document.getElementById("intentos").innerHTML = intentosRestantes;

                //controlamos si ya acabo todas la oportunidades
                if(intentosRestantes<=0){
                    for(i=0;i<arrayPalabraActual.length;i++){
                        LoseA.play();
                        divsPalabraActual[i].className="letra pintarError";
                    }
                    setTimeout(cargarNuevaPalabra,1000);
                }
            }
            document.getElementById("letrasIngresadas").innerHTML += event.key.toLocaleUpperCase() + " - ";
        }
    }
});

//Funcion que me determina si un caracter es una letra
function isLetter(str) {
    return str.length === 1 && str.match(/[a-z]/i);
}


</script>