<?php
    require "conecta.php";
    $con = conecta();

    // Recoger los datos enviados por el formulario
    $user = $_POST['user'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    // Validar si los campos no están vacíos
    if (!empty($user) && !empty($mail) && !empty($pass)) {
        // Escapar los caracteres especiales para evitar inyecciones SQL
        $user = $con->real_escape_string($user);
        $mail = $con->real_escape_string($mail);
        $pass = $con->real_escape_string($pass);

        // Comprobar si ya existe un usuario con el mismo nombre o correo
        $sqlCheck = "SELECT * FROM usuarios WHERE nombre = '$user' OR correo = '$mail'";
        $result = $con->query($sqlCheck);


        if ($result->num_rows > 0) {
            // Si se encuentra una coincidencia, no se inserta y se muestra un mensaje de error
            echo 2;
        } else {
            // Encriptar la contraseña antes de almacenarla
            $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

            // Insertar el usuario en la tabla de usuarios
            $sql = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$user', '$mail', '$hashed_pass')";

            if ($con->query($sql) === TRUE) {
                // Si la inserción fue exitosa
                //aquí seleccionar el id del usuario

                echo 1;  // Devuelve 1 si es exitoso
            } else {
                // Si hubo algún error al ejecutar la consulta
                echo 0;
            }
        }
    } else {
        // Si algún campo está vacío
        echo 0;  // Devuelve 0 si faltan campos
    }

    // Cerrar la conexión
    $con->close();
?>
