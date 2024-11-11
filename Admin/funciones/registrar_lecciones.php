<?php
    require "conecta.php"; 
    $con = conecta();

    // Verifica si los datos han sido recibidos correctamente
    if (isset($_POST['id_lecciones']) && isset($_POST['id_modulos']) && isset($_POST['nombre_leccion'])) { //segun el error esta aqui
        $id_lecciones = $_POST['id_lecciones'];
        $id_modulos = $_POST['id_modulos'];
        $nombre_leccion = $_POST['nombre_leccion'];


        // Muestra los datos recibidos para asegurarte de que llegan correctamente
        echo "Datos recibidos: id_lecciones=$id_lecciones, id_modulos=$id_modulos, nombre_leccion=$nombre_leccion";

        //Inserción de datos
        $sql = "INSERT INTO videos (nombre, desbloqueado, lecciones_id, lecciones_modulos_id) VALUES ($nombre_leccion,1,$id_lecciones ,$id_modulos);";
        $res = $con->query($sql);

        if ($res) {
            echo "Actualización exitosa"; // Verifica si la actualización fue exitosa
        } else {
            echo "Error al actualizar: " . $con->error; // Muestra cualquier error
        }
    } else {
        echo "Datos no recibidos";
    }
?>