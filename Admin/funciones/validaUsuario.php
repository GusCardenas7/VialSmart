<?php
    session_start();  
    
    require "conecta.php";
    $con = conecta();

    // Recoger los datos enviados por el formulario
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Validar si los campos no están vacíos
    if (!empty($user) && !empty($pass)) {
        // Escapar los caracteres especiales para evitar inyecciones SQL
        $user = $con->real_escape_string($user);
        $pass = $con->real_escape_string($pass);

        // Comprobar si existe el usuario
        $sqlCheck = "SELECT * FROM usuarios WHERE nombre = '$user'";
        $result = $con->query($sqlCheck);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Verificar la contraseña
            if (password_verify($pass, $row['contraseña'])) {
                session_regenerate_id(true);

                $_SESSION['idU'] = $row['id']; 
                $_SESSION['nombreU'] = $row['nombre']; 
                $_SESSION['correoU'] = $row['correo'];
                echo 1;  // Si el usuario y la contraseña son correctos
            } else {
                echo 0;  // Contraseña incorrecta
            }
        } else {
            echo 0;  // Usuario no encontrado
        }
    } else {
        // Si algún campo está vacío
        echo 0;  // Devuelve 0 si faltan campos
    }

    // Cerrar la conexión
    $con->close();
?>
