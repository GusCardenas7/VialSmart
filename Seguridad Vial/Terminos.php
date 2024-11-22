<?php
    require "../Admin/funciones/comprobarSesion.php";
   
?>

<html>
<head>
    <title>Términos y Condiciones</title>
    <link rel="stylesheet" href="../CSS/terminos.css">
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
                    <img src="../imagenes/Terminos.png" class="header-image" alt="Imagen Agitada">
                    <div class="moduleTitle scale-up-top">Términos y Condiciones</div>
                </div>
                <div id="lessons" class="lessons scale-up-bottom">
                    <p class="term-title">1. Uso de la Plataforma</p>
                    <p>VialSmart es una plataforma educativa para niños de 10 a 12 años con fines exclusivamente educativos. Padres o tutores deben supervisar su uso.</p><br><br>

                    <p class="term-title">2. Registro y Cuenta de Usuario</p>
                    <p>Para acceder, se requiere crear una cuenta. La información debe ser veraz, y el usuario es responsable de su cuenta y actividades.</p><br><br>

                    <p class="term-title">3. Privacidad y Seguridad</p>
                    <p>VialSmart recoge datos mínimos para mejorar la experiencia educativa. Consulta nuestra Política de Privacidad para detalles.</p><br><br>

                    <p class="term-title">4. Uso de Contenido </p>
                    <p>Todo el contenido es propiedad de VialSmart y no puede ser distribuido ni reproducido sin autorización, salvo para uso personal y educativo.</p><br><br>

                    <p class="term-title">5. Responsabilidades del Usuario</p>
                    <p>El usuario se compromete a utilizar la plataforma de forma segura y respetuosa, sin alterar su funcionamiento ni afectar a otros usuarios.</p><br><br>

                    <p class="term-title">6. Limitación de Responsabilidad</p>
                    <p>VialSmart no garantiza disponibilidad continua ni se responsabiliza por fallos técnicos o cualquier daño derivado del uso de la plataforma.</p><br><br>

                    <p class="term-title">7. Modificaciones</p>
                    <p>VialSmart puede actualizar estos términos, y el uso continuado de la plataforma implica aceptación de las modificaciones.</p><br><br>

                    <p>Gracias por utilizar VialSmart para promover una educación vial segura.</p><br><br>               


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
            <a href="Terminos.php">Términos y condiciones</a>
            <a href="Politica.php">Política de privacidad</a>
            <a href="Contacto_formulario.php">Contáctanos</a>
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
