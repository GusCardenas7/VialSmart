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
                // Obtener el ID del usuario recién insertado
                $usuario_id = $con->insert_id;

                // Insertar logros para el usuario recién registrado
                $logros = [
                    ['Un buen comienzo', 'Completa la primera lección'],
                    ['Sin la introducción no se puede avanzar', 'Completa el primer módulo'],
                    ['Experto en señales de tránsito', 'Completa el segundo módulo'],
                    ['Reglas básicas aprendidas', 'Completa el tercer módulo'],
                    ['Maestro de la seguridad en el vehículo', 'Completa el cuarto módulo'],
                    ['Conocedor de las situaciones de emergencia', 'Completa el quinto módulo'],
                    ['La seguridad lo es todo', 'Completa el sexto módulo'],
                    ['Especialista en disuasión de delitos', 'Completa el séptimo módulo'],
                    ['Graduado en seguridad vial', 'Completa el octavo módulo'],
                    ['Conocimiento básico de seguridad vial', 'Consigue una puntuación de 100 puntos en el juego 1.1'],
                    ['Identificación de usuarios viales', 'Consigue una puntuación de 100 puntos en el juego 1.2'],
                    ['Anatomía de la vía', 'Consigue una puntuación de 100 puntos en el juego 1.3'],
                    ['Guardián de las señales de tránsito', 'Consigue una puntuación de 100 puntos en el juego 2.1'],
                    ['Conocedor de señales comunes', 'Consigue una puntuación de 100 puntos en el juego 2.2'],
                    ['Educador vial infantil', 'Consigue una puntuación de 100 puntos en el juego 2.3'],
                    ['Cruzando con seguridad', 'Consigue una puntuación de 100 puntos en el juego 3.1'],
                    ['Peatón responsable', 'Consigue una puntuación de 100 puntos en el juego 3.2'],
                    ['Ciclista seguro', 'Consigue una puntuación de 100 puntos en el juego 3.3'],
                    ['Cinturón de seguridad al 100%', 'Consigue una puntuación de 100 puntos en el juego 4.1'],
                    ['Pasajero seguro', 'Consigue una puntuación de 100 puntos en el juego 4.2'],
                    ['Viajero escolar responsable', 'Consigue una puntuación de 100 puntos en el juego 4.3'],
                    ['Reacción ante accidentes', 'Consigue una puntuación de 100 puntos en el juego 5.1'],
                    ['Primeros auxilios viales', 'Consigue una puntuación de 100 puntos en el juego 5.2'],
                    ['Prevención ante emergencias', 'Consigue una puntuación de 100 puntos en el juego 5.3'],
                    ['Detector de riesgos', 'Consigue una puntuación de 100 puntos en el juego 6.1'],
                    ['Estratega de prevención', 'Consigue una puntuación de 100 puntos en el juego 6.2'],
                    ['Conciencia de seguridad personal', 'Consigue una puntuación de 100 puntos en el juego 6.3'],
                    ['Primer respondiente vial', 'Consigue una puntuación de 100 puntos en el juego 7.1'],
                    ['Interacción segura con extraños', 'Consigue una puntuación de 100 puntos en el juego 7.2'],
                    ['Respeto en la vía', 'Consigue una puntuación de 100 puntos en el juego 8.1'],
                    ['Resolución pacífica de conflictos', 'Consigue una puntuación de 100 puntos en el juego 8.2'],
                ];

                foreach ($logros as $logro) {
                    $sqlLogro = "INSERT INTO logros (nombre, descripcion, usuarios_id) VALUES (?, ?, ?)";
                    $stmt = $con->prepare($sqlLogro);
                    $stmt->bind_param('ssi', $logro[0], $logro[1], $usuario_id);
                    $stmt->execute();
                }

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
