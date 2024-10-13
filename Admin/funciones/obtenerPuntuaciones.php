<?php
header('Content-Type: application/json');
require "conecta.php";
$con = conecta();

$nombre_juego = $_GET['nombre_juego'];

// Consulta para obtener los datos del ranking
$sql = "SELECT usuarios.id, usuarios.nombre AS nombre_usuario, MAX(juegos.puntaje) AS mejor_puntaje, juegos.nombre AS nombre_juego, usuarios.nivel
        FROM usuarios
        INNER JOIN modulos ON usuarios.id = modulos.usuarios_id
        INNER JOIN juegos ON modulos.id = lecciones_modulos_id
        WHERE juegos.nombre = $nombre_juego
        GROUP BY usuarios.nombre
        ORDER BY mejor_puntaje DESC";
        
$result = $con->query($sql);

$usuarios = [];
$posicion = 1;

if ($result->num_rows > 0) {
    // Obtener cada fila y agregarla al array con la posición
    while($row = $result->fetch_assoc()) {
        $row['posicion'] = $posicion;  // Añade la posición
        $usuarios[] = $row;
        $posicion++;
    }
}

// Cerrar la conexión
$con->close();

// Devolver los datos en formato JSON
echo json_encode($usuarios);
?>
