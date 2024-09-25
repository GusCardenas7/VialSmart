<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../CSS/signup.css">
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
            var usuario = document.forma01.user.value;
            var correo = document.forma01.mail.value;
            var contraseña = document.forma01.pass.value;
            
            if((usuario == "") || (correo == "") || (contraseña == "")) {
                $('#mensaje').html('Faltan campos por llenar');
                setTimeout("$('#mensaje').html('')",5000);
                return false;
            } else {
                var user = $("#user").val();
                var mail = $("#mail").val();
                var pass = $("#pass").val();
                
                if(user && mail && pass) {
                    $.ajax({
                        url: '../Admin/funciones/insertarUsuario.php',
                        type: 'POST',
                        data: { 'user': user, 'mail': mail, 'pass': pass },
                        success: function(res) {
                            if (res == 1) {
                                window.location.href = "login.php";  // Redireccionar si es exitoso
                            } else if(res == 2) {
                                $('#mensaje').html('Usuario o correo ya en uso');
                                setTimeout("$('#mensaje').html('')",5000);
                            } else {
                                $('#mensaje').html('Error en el servidor');
                                setTimeout("$('#mensaje').html('')",5000);
                            }
                        },
                        error: function() {
                            alert('Error archivo no encontrado...');
                        }
                    });
                }
                return false;
            }
        }
    </script>
</head>
<body>
    <img src="../imagenes/logo.png" class="logo">
    <div class='container'>
        <div class='wrapper'>
            <div class='title'><span>¡Registrate!</span></div>
            <form name="forma01" method="POST" onsubmit="return valida();">
            <!-- Usuario  -->
            <div class='row'>
                <i class='bi bi-person'></i>
                <input type="text" name="user" id="user" required placeholder='Nombre de usuario'>
            </div>
             <!-- Correo  -->
             <div class="row">
                    <i class="bi bi-envelope"></i>
                    <input type="email" name="mail" id="mail" required placeholder="Correo">
             </div>
             <!-- Contraseña  -->
            <div class='row'>
                <i class='bi bi-lock'></i>
                <input type='password' name='pass' id="pass" required placeholder='Contraseña'>
            </div>
             <!-- Boton  -->
            <div class='row button'>
                <input type='submit' value='Registrarse'>
            </div>
            </form>
        </div>
        <div id='mensaje'></div>
    </div>
    <div class="linkToLogin">¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></div>
    <div class='link divALaIzquierda'><a href="IndexSV.php"><img src="../imagenes/regresar.png" width="90px" height="90px"></a></div>
</body>
</html>