<?php
// Configuración de la conexión a la base de datos


$servername = "localhost";
$username = "id20807182_root";
$password = "Bgutierrez2018.";
$dbname = "id20807182_arsaro";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los valores del mensaje del formulario
$incomingId = $_POST['incoming_id'];
$outcomingId = $_POST['outcoming_id'];
$message = $_POST['message'];

date_default_timezone_set('America/Mexico_City'); // Establecer la zona horaria de México
$fecha = date('Y-m-d H:i:s');


// Preparar la consulta SQL para insertar el mensaje en la tabla "messages"
$sql = "INSERT INTO chat (incoming_msg_iid, outgoing_msg_id, Mensaje, fecha) VALUES ('$incomingId', '$outcomingId', '$message','$fecha')";

if ($conn->query($sql) === TRUE) {
    $response = array(
        'status' => 'success',
        'message' => 'Mensaje enviado correctamente.',
        'id' => $outcomingId
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Error al enviar el mensaje: ' . $conn->error
    );
}

// Enviar la respuesta en formato JSON
echo json_encode($response);

// Cerrar la conexión a la base de datos
$conn->close();
?>