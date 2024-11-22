<?php
    require "../Admin/funciones/comprobarSesion.php";
   
?>

<html>
<head>
   

    <title>Contacto</title>
    <link rel="stylesheet" href="../CSS/contacto.css">
    <script src="../JS/jquery-3.3.1.min.js"></script>
    <script>
        //estas lineas de codigo evitan que se envie el formulario al presionar la tecla Enter
        $(document).ready(function() {
            $("form").keypress(function(e) {
                if (e.which == 13) {
                    return false;
                }
            });
        });

        function valida() {
            var nombre = document.forma01.nombre.value;
            var apellidos = document.forma01.apellidos.value;
            var correo = document.forma01.correo.value;
            var mensaje = document.forma01.mensaje.value;
            
            if((nombre == "") || (apellidos == "") || (correo == "") || (mensaje == "")) {
                $('#mensaje2').html('Faltan campos por llenar');
                setTimeout("$('#mensaje2').html('')",5000);
                return false;
            }
            return true;
        }
    </script>
  
</head>
<body> 
    <div class="content">
        <!-- Tu contenido principal aquí -->
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

        <!-- Contenido del formulario y demás elementos -->
        <br><br><br><br><br><br><br><br><br>
        <div class="titulo scale-up-top">Formulario de contacto</div><br><br>

        <!-- Contenedor del formulario con fondo -->
        <div class="form-container">
            <form name="forma01" action="contacto_envia.php" method="POST" align="center">
                <label class="etiquetas" for="nombre">Nombre:</label><br><br>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre">
                <br><br>
                <label class="etiquetas" for="apellidos">Apellidos:</label><br>
                <input type="text" name="apellidos" id="apellidos" placeholder="Escribe tus apellidos">
                <br><br>
                <label class="etiquetas" for="correo">Correo:</label><br><br>
                <input type="email" name="correo" id="correo" placeholder="Escribe tu correo">
                <br><br>
                <label class="etiquetas" for="mensaje">Mensaje:</label><br><br>
                <textarea name="mensaje" id="mensaje" cols="30" rows="5" placeholder="Escribe el mensaje a enviar"></textarea>
                <br><br>
                <input style="background-color: red; width: 150px; margin: 10px auto; color: white; font-size: 16px; font-family: 'Share Tech Mono', monospace;" onclick="return valida();" type="submit" value="Enviar">
            </form>
            <div id="mensaje2"></div>
        </div>
    </div>

    <!-- Footer -->
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

