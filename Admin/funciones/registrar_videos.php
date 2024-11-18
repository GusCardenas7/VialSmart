<?php
require "conecta.php"; 
$con = conecta();

if (isset($_POST['id_lecciones'], $_POST['id_modulos'], $_POST['tipo_juego'], $_POST['nombre_leccion'])) {
    $id_lecciones = $_POST['id_lecciones'];
    $id_modulos = $_POST['id_modulos'];
    $tipo_juego = $_POST['tipo_juego'];
    $nombre_leccion = $_POST['nombre_leccion'];

    // Verifica los datos recibidos
    echo "Datos recibidos: id_lecciones=$id_lecciones, tipo_juego=$tipo_juego, id_modulos=$id_modulos, nombre_leccion=$nombre_leccion";

    // Inserción de datos
    $sql = "INSERT INTO juegos (nombre, tipo, desbloqueado, puntaje, lecciones_id, lecciones_modulos_id) VALUES ('$nombre_leccion','$tipo_juego',0,0,$id_lecciones ,$id_modulos);";
    $res = $con->query($sql);

    if ($res) {
        echo "Actualización exitosa"; // Verifica si la actualización fue exitosa
    } else {
        echo "Error al actualizar: " . $con->error; // Muestra cualquier error
    }
} else {
    echo "Datos no recibidos"; // Mensaje en caso de que falten datos
}
?>
