<?php
    require "conecta.php"; 
    $con = conecta();

    // Verifica si los datos han sido recibidos correctamente
    if (isset($_POST['nombre']) && isset($_POST['id_usuario']) && !isset($_POST['puntos'])) { //segun el error esta aqui
        $nombreLogro = $_POST['nombre'];
        $id_usuario = $_POST['id_usuario'];

        // Muestra los datos recibidos para asegurarte de que llegan correctamente
        echo "Datos recibidos: nombreLogro=$nombreLogro, id_usuario=$id_usuario";

        // Realiza la actualizaci�n en la base de datos
        $sql = "UPDATE logros SET desbloqueado = 1 WHERE nombre = $nombreLogro AND usuarios_id = $id_usuario";
        $res = $con->query($sql);

        if ($res) {
            echo "Actualizaci�n exitosa"; // Verifica si la actualizaci�n fue exitosa
        } else {
            echo "Error al actualizar: " . $con->error; // Muestra cualquier error
        }
    } else if (isset($_POST['nombre']) && isset($_POST['id_usuario']) && isset($_POST['puntos'])) {
        $nombreLogro = $_POST['nombre'];
        $id_usuario = $_POST['id_usuario'];
        $puntos = $_POST['puntos'];

        // Muestra los datos recibidos para asegurarte de que llegan correctamente
        echo "Datos recibidos: nombreLogro=$nombreLogro, id_usuario=$id_usuario, puntos=$puntos";
        if($puntos == 100) {
            // Realiza la actualizaci�n en la base de datos
            $sql = "UPDATE logros SET desbloqueado = 1 WHERE nombre = $nombreLogro AND usuarios_id = $id_usuario";
            $res = $con->query($sql);

            if ($res) {
                echo "Actualizaci�n exitosa"; // Verifica si la actualizaci�n fue exitosa
            } else {
                echo "Error al actualizar: " . $con->error; // Muestra cualquier error
            }
        } else {
            echo "Puntuación no alcanzada";
        }
    } else {
        echo "Datos no recibidos";
    }
?>