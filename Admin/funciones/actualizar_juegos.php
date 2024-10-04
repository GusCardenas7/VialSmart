<?php
    require "conecta.php"; 
    $con = conecta();

    // Verifica si los datos han sido recibidos correctamente
    if (isset($_POST['id_juego']) && isset($_POST['puntaje']) && isset($_POST['id_modulos']) && isset($_POST['nombre_leccion'])) { //segun el error esta aqui
        $id_juego = $_POST['id_juego'];
        $puntaje = $_POST['puntaje'];
        $id_modulos = $_POST['id_modulos'];
        $nombre_leccion = $_POST['nombre_leccion'];


        // Muestra los datos recibidos para asegurarte de que llegan correctamente
        echo "Datos recibidos: id_juego=$id_juego, puntaje=$puntaje, id_modulos=$id_modulos, nombre_leccion=$nombre_leccion";

        // Realiza la actualización en la base de datos
        $sql = "UPDATE juegos SET desbloqueado = 1, puntaje = $puntaje WHERE id = $id_juego";
        $res = $con->query($sql);

        $sql = "SELECT * FROM lecciones WHERE nombre=$nombre_leccion AND modulos_id = $id_modulos";
        $res = $con->query($sql);
        $fila= mysqli_num_rows($res);
                
        if($fila == 0){
           $sql = "INSERT INTO lecciones (nombre, desbloqueado, modulos_id) VALUES ($nombre_leccion,1, $id_modulos);";
           $res = $con->query($sql);
        }

        if ($res) {
            echo "Actualización exitosa"; // Verifica si la actualización fue exitosa
        } else {
            echo "Error al actualizar: " . $con->error; // Muestra cualquier error
        }
    } else {
        echo "Datos no recibidos";
    }
?>