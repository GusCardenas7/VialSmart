<?php
    require "conecta.php"; 
    $con = conecta();

    // Verifica si los datos han sido recibidos correctamente
    if (isset($_POST['nuevoCorreo']) && isset($_POST['id'])) { 
        $nuevoCorreo = $_POST['nuevoCorreo'];
        $id = $_POST['id'];


        // Muestra los datos recibidos para asegurarte de que llegan correctamente
        echo "Datos recibidos: nuevoCorreo=$nuevoCorreo, id=$id";
        
           // Realiza la actualizaci�n en la base de datos
           $sql = "UPDATE usuarios SET correo = '$nuevoCorreo' WHERE id = $id";
           $res = $con->query($sql);

        if ($res) {
            echo "Actualizaci�n exitosa"; // Verifica si la actualizaci�n fue exitosa
        } else {
            echo "Error al actualizar: " . $con->error; // Muestra cualquier error
        }
    } else {
        echo "Datos no recibidos";
    }
?>