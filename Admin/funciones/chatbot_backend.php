<?php
header('Content-Type: application/json');
require 'conecta.php';
$con = conecta();

// Obtener el input JSON
$input = json_decode(file_get_contents('php://input'), true);
$userMessage = isset($input['message']) ? trim($input['message']) : '';

// Respuesta predeterminada
$reply = "Lo siento, no entendí tu solicitud. ¿Puedes reformularla?";

// Verificar conexión
if ($con->connect_error) {
    $reply = "Error en el servidor. Por favor, intenta más tarde.";
    echo json_encode(['reply' => $reply]);
    exit();
}

// Procesar el mensaje del usuario
// Aquí puedes implementar lógica basada en reglas o consultar la base de datos

// Ejemplo simple: Buscar en la base de datos una respuesta predefinida
$stmt = $con->prepare("SELECT respuesta FROM respuestas_chatbot WHERE pregunta LIKE ?");
$search = "%" . $con->real_escape_string($userMessage) . "%";
$stmt->bind_param("s", $search);
$stmt->execute();
$stmt->bind_result($dbReply);
if ($stmt->fetch()) {
    $reply = $dbReply;
}
$stmt->close();
$con->close();

// Devolver la respuesta
echo json_encode(['reply' => $reply]);
?>
