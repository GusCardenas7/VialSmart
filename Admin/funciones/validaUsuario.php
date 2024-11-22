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

                $id_usuario = $_SESSION['idU'];
        
                $sql = "SELECT * FROM modulos WHERE nombre='Introduccion' AND usuarios_id = $id_usuario";
                $res = $con->query($sql);
                $fila= mysqli_num_rows($res);
                
                if($fila == 0){
                   $sql = "INSERT INTO modulos (nombre, usuarios_id) VALUES ('Introduccion',$id_usuario);";
                   $res = $con->query($sql);

                   $sql = "SELECT * FROM modulos WHERE nombre='Introduccion' AND usuarios_id = $id_usuario";
                   $res = $con->query($sql);

                   while($row =$res->fetch_array()){
                      $id_modulos = $row["id"];
                   }  
                   $sql = "INSERT INTO lecciones (nombre, desbloqueado, modulos_id) VALUES ('Que es la seguridad vial',1, $id_modulos);";
                   $res = $con->query($sql);
                }
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
