<?php
    require "../Admin/funciones/comprobarSesion.php";
   
?>

<html>
<head>
    <title>Lección 1.1</title>
    <link rel="stylesheet" href="../CSS/leccion1-1.css">
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
       $sql = "SELECT * FROM modulos WHERE nombre='Introduccion' AND usuarios_id = $id_usuario"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_modulos = $row["id"];
       } 

       $sql = "SELECT * FROM lecciones WHERE nombre='Que es la seguridad vial' AND desbloqueado = 1 AND modulos_id = $id_modulos"; //aquí varía el nombre del módulo
       $res = $con->query($sql);

       while($row =$res->fetch_array()){
         $id_lecciones = $row["id"];
       } 
    ?>

    <br><br><br><br><br>
    <div class="content">
        <div class="header-container">
                    <img src="../imagenes/niño.png" class="header-image" alt="Imagen Agitada">
                    <div class="moduleTitle scale-up-top">Lección 1.1: ¿Qué es la seguridad vial?</div>
                </div>
                <div id="lessons" class="lessons scale-up-bottom">
                    <p>Hoy comenzamos un emocionante viaje en el que aprenderemos a cuidarnos mejor cuando estamos en las calles y carreteras. 🚘🚲🛴🛵🚌🚎🚶🏼‍♀️</p> <br><br>
                    <p>A lo largo de nuestras lecciones, descubriremos cómo las reglas de tránsito nos ayudan a prevenir accidentes, proteger a los demás y respetar a quienes comparten las vías con nosotros. Nos aseguraremos de entender lo que podemos hacer, ya sea caminando, en bicicleta o en coche, para llegar siempre a nuestros destinos de manera segura.</p> <br><br>
                    <p>En esta primera lección, abordaremos algunos conceptos básicos muy importantes. Vamos a hablar sobre qué es la seguridad vial, por qué es fundamental para todos y qué reglas necesitamos seguir para estar siempre a salvo. Aprenderemos cómo cada uno de nosotros puede ser un "héroe de la seguridad vial" y hacer que nuestras calles sean lugares seguros y respetuosos.</p> <br><br>
                    <p>Entonces, ¿están listos para comenzar? 👨🏼‍🏫 Vamos a sumergirnos en el mundo de la seguridad vial y descubrir cómo podemos ser parte de la solución para prevenir accidentes y mejorar nuestra convivencia en las calles. 🚥</p>
                </div>
                 <center> <button class="btn" id="boton" onclick="desbloquear()"> Marcar como completo </button> </center> <!-- Añadí esto-->
        <div class="arrowsContainer">
            <div><a href="lecciones.php"><img src="../imagenes/regresar.png" width="90px" height="90px"></a></div>
            <div id="FlechaDesbloqueada"><a href="videoL1-1.php"><img src="../imagenes/avanzar.png" width="90px" height="90px"></a></div> <!-- Añadí esto-->
        </div>
    </div> 

    <?php    
        // Verifico si existe ya un registro con esos datos
        $sql = "SELECT * FROM videos WHERE nombre='Que es la seguridad vial' AND desbloqueado = 1 AND lecciones_id = $id_lecciones AND lecciones_modulos_id = $id_modulos";
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

<script>

function desbloquear(){
   //aqui se tiene que evaluar que si ya hay un modulo introduccion con el id del usuario entonces que la flecha aparezca por sí sola y que no haga el insert.
   document.getElementById("FlechaDesbloqueada").style.display = "block";
   
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
          xhr.send("id_lecciones=" + <?php echo $id_lecciones; ?> + "&id_modulos=" + <?php echo $id_modulos; ?> + "&nombre_leccion='Que es la seguridad vial'");
          
<?php } ?>
   
}

</script>
