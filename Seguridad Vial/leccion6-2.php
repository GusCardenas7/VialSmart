﻿<?php
    require "../Admin/funciones/comprobarSesion.php"; 
?>
<html>
<head>
    <title>Lección 6.2</title>
    <script src="../JavaScript/lecciones.js"></script>
    <script src="../JavaScript/lecciones_typewritter.js"></script>
</head>
<body> 
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

    ?>
    <br><br><br><br><br>
    <div class="content">
        <div class="header-container">
                    <img src="../imagenes/niño.png" class="header-image" alt="Imagen Agitada">
                    <div class="moduleTitle scale-up-top">Lección 6.2 Estrategias de prevención</div>
                </div>
                <div id="lessons" class="lessons scale-up-bottom">
                    <p style="color:#295854; font-style: italic;">Mantenernos seguros en la calle no solo depende de identificar riesgos, sino también de tomar acciones para evitarlos. Aquí te presentamos algunas estrategias para protegerte mientras te desplazas.</p> <br><br>
                    <p style="font-weight:bold; color:#1d5a4c; ">👀 Manten la visibilidad </p><br><p>Es muy importante caminar siempre por áreas bien iluminadas y donde otras personas puedan verte. Si hay opciones, elige rutas donde haya más gente o movimiento, como calles principales. Además, evita zonas con muchos árboles o autos estacionados donde alguien podría ocultarse. Ser visible significa estar más seguro.</p><br><br>
                    <p style="font-weight:bold; color:#29933f;">✅ Usa rutas seguras</p><br><p>Antes de salir, es recomendable planificar tu ruta. Piensa en los caminos más directos y transitados que puedes tomar. Si puedes, evita atajos por callejones o áreas solitarias. También avisa a alguien de confianza sobre tu recorrido, especialmente si vas a caminar solo.</p><br><br>
                    <p style="font-weight:bold; color:#188999;">👨‍👨‍👧‍👧 Mantente en compañía </p><br><p>Siempre que sea posible, trata de caminar con amigos o familiares. Ir en grupo es más seguro, ya que es menos probable que una persona malintencionada se acerque a un grupo. Si no tienes compañía, mantente alerta y evita distraerte con el teléfono o los audífonos mientras caminas.</p><br><br>
                    <p style="font-weight:bold; color:#6a0d21;">🕵🏼‍♂️ Confía en tu instinto </p><br><p>Si algo no te parece correcto, no dudes en alejarte. Tu instinto es una herramienta valiosa, así que confía en lo que sientas. Si alguien o alguna situación te pone nervioso, busca un lugar seguro o cambia de dirección.</p><br><br>
                    <p style="font-weight:bold; color:#a20909;">🚨 Siempre alerta </p><br><p>Mantén los ojos y oídos atentos a lo que sucede a tu alrededor. Aunque estés en una zona conocida, es esencial estar pendiente de las personas y situaciones a tu alrededor para reaccionar rápido en caso de algún problema.</p><br><br>
                    <p style="color:#295854;  font-style: italic;"><i>La prevención es la clave para evitar problemas en la vía pública. Si aplicas estas estrategias, estarás mejor preparado para moverte con seguridad y evitar situaciones de riesgo.</i></p>
                </div>
                <center> <button class="btn" id="boton" onclick="desbloquear()"> Marcar como completo </button> </center> <!-- Añadí esto-->
                
        <div class="arrowsContainer">
            <div><a href="Juego16.php"><img src="../imagenes/regresar.png" width="90px" height="90px"></a></div>
            <div id="FlechaDesbloqueada"><a href="videoL6-2.php"><img src="../imagenes/avanzar.png" width="90px" height="90px"></a></div>
        </div>
    </div> 

    <?php    
        // Verifico si existe ya un registro con esos datos
        $sql = "SELECT * FROM videos WHERE nombre='Estrategias de prevencion' AND desbloqueado = 1 AND lecciones_id = $id_lecciones AND lecciones_modulos_id = $id_modulos";
        $res = $con->query($sql);
        $fila= mysqli_num_rows($res);
        
        if($fila >= 1){
          echo "<script> document.getElementById('FlechaDesbloqueada').style.display = 'block'; </script>";
          echo "<script> document.getElementById('boton').style.display = 'none'; </script>";
        }
     ?>

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
<style>
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    background-color: #FF4E41;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='0.07'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E"); 
    background-repeat: repeat;
    display: flex;
    flex-direction: column;
    min-height: 100%;
}

.content {
    flex: 1;
}

.moduleTitle {
    color: black;
    text-align: center;
    font-size: 40px;
    font-weight: bold;
    font-family: 'Share Tech Mono', monospace;
    background: rgba(255, 255, 255, 0.5); /* Color de fondo con opacidad */
    backdrop-filter: blur(2px); /* Aplica el desenfoque */
    border: 2px solid #FF4C4C;
    border-radius: 40px;
    padding: 25px 40px;
    margin: 0;
    width: 900px; 
    margin-left: 15px; 
}

.btn {
    border: none;
    box-shadow: 4px 4px 2px #2e3031;
    background: #868889;
    color: #252525;
    padding: 10px 20px;
    border-radius: 50px;
    cursor: pointer;
    transition: .5s;
    font-size: 24px;
    font-family: 'Share Tech Mono', monospace;
    font-weight: bold;
    text-align: center;
}

#FlechaDesbloqueada {
    display: none;
}


.lessons {
    display: block;
    width: 990px;
    height: 1200px;
    margin: 10px auto;
    border: 2px solid #FF4C4C;
    border-radius: 40px;
    padding: 25px 40px;
    background: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(2px);
    word-wrap: break-word; /* Asegura que el texto se ajuste al ancho */
    overflow-wrap: break-word; /* Para palabras largas */
    text-align: justify; 
}

.lessons p {
    margin: 0;
    padding: 0;
    font-size: 20px;
    line-height: 1.5;
    color: black;
    font-family: 'Share Tech Mono', monospace;
    white-space: normal; 
}

.header-container {
    display: flex;
    align-items: center; 
    padding: 20px;
    gap: 20px; 
}

.header-image {
    width: 120px; 
    height: auto;
    margin-left: 50px;
    animation: shake 3s ease-in-out infinite; /* Aplica la animación de agitación */
}

/* Animación de agitación */
@keyframes shake {
    0% { transform: translateX(-10px) rotate(-2deg); }
    25% { transform: translateX(10px) rotate(2deg); }
    50% { transform: translateX(-10px) rotate(-2deg); }
    75% { transform: translateX(10px) rotate(2deg); }
    100% { transform: translateX(-10px) rotate(-2deg); }
}

.tracking-in-expand-forward-top{animation:tracking-in-expand-forward-top 0.4s linear both} @keyframes tracking-in-expand-forward-top{0%{letter-spacing:-.2em;transform:translateZ(-700px) translateY(-100px);opacity:0}40%{opacity:.6}100%{transform:translateZ(0) translateY(0);opacity:1}}
/* ----------------------------------------------
  Generated by AnimatiSS
  Licensed under FreeBSD License
  URL: https://xsgames.co/animatiss
  Twitter: @xsgames_
---------------------------------------------- */

.scale-up-top{animation:scale-up-top 0.4s; } @keyframes scale-up-top{0%{transform:scale(.5);transform-origin:center top}100%{transform:scale(1);transform-origin:center top}}
.scale-up-bottom{animation:scale-up-bottom 0.8s; } @keyframes scale-up-bottom{0%{transform:scale(.5);transform-origin:center bottom}100%{transform:scale(1);transform-origin:center bottom}}

.arrowsContainer {
    display: flex;
    justify-content: space-between;
    padding: 20px 40px;
}

footer {
    background-color: #000000;
    color: #b7b7b7;
    padding: 15px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 15px;
    font-weight: normal;
    position: relative;
}

footer .links {
    display: flex;
    gap: 30px;
}

footer a {
    color: white;
    text-decoration: none;
    font-weight: normal;
}

footer a:hover {
    text-decoration: underline;
    color: white;
}

footer a:active {
    color: white;
}

footer .copyright {
    font-size: 13px;
}

footer .copyright::after {
    content: '';
    position: absolute;
    right: 25px;
    top: 10px;
    height: 30px;
    width: 0.1px;
    background-color: #b7b7b7;
}
</style>
<script>
function desbloquear(){
   //aqui se tiene que evaluar que si ya hay un modulo introduccion con el id del usuario entonces que la flecha aparezca por sí sola y que no haga el insert.
   document.getElementById("FlechaDesbloqueada").style.display = "block";
   document.getElementById('boton').style.display = 'none';

   <?php if($fila == 0){ ?>
           // --- Llamada AJAX para actualizar la base de datos ---
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "../Admin/funciones/registrar_lecciones.php", true);
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
          xhr.send("id_lecciones=" + <?php echo $id_lecciones; ?> + "&id_modulos=" + <?php echo $id_modulos; ?> + "&nombre_leccion='Estrategias de prevencion'");
          
   <?php } ?>
   
}
</script>