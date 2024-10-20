<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../CSS/login.css">
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
        var contraseña = document.forma01.pass.value;
        
        if((usuario == "") || (contraseña == "")) {
            $('#mensaje').html('Faltan campos por llenar');
            setTimeout("$('#mensaje').html('')",5000);
            return false;
        }
        else {
            var user = $("#user").val();
            var pass = $("#pass").val();
            if(user && pass) {
                $.ajax ({
                        url     : '../Admin/funciones/validaUsuario.php',
                        type    : 'post',
                        datatype : 'text',
                        data    : {'user' : user, 'pass' : pass},
                        success : function(res) {
                            if (res == 1) {
                                window.location.href = "IndexSV.php";
                            } else {
                                $('#mensaje').html('Usuario no válido');
                                setTimeout("$('#mensaje').html('')",5000);
                            }
                    },error: function() {
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
            <div class='title'><span>Bienvenid@</span></div>
            <form name="forma01" method="POST" onsubmit="return valida();">
            <div class='row'>
                <i class='bi bi-person'></i>
                <input type="text" name="user" id="user" required placeholder='Nombre de usuario'>
            </div>
            <div class='row'>
                <i class='bi bi-lock'></i>
                <input type='password' name='pass' id="pass" required placeholder='Contraseña'>
            </div>
            <div class='row button'>
                <input type='submit' value='Iniciar sesión'>
            </div>
            </form>
        </div>
        <div id='mensaje'></div>
    </div>
    <div class="linkToSignUp">¿Todavía no tienes una cuenta? <a href="signup.php">Regístrate</a></div>
    <div class='link divALaIzquierda'><a href="IndexSV.php"><img src="../imagenes/regresar.png" width="90px" height="90px"></a></div>
</body>
</html>