<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "id20807182_root";
$password = "Bgutierrez2018.";
$dbname = "id20807182_arsaro";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Realizar la consulta SQL para obtener los datos de la tabla "zona"
$sql = "SELECT `agente_venta`.`id_Agente`, `usuarios`.`Nombre`, `usuarios`.`Apellido_Paterno`, `usuarios`.`Rol`, `usuarios`.`Rol`, `zonas`.`Latitud`, `zonas`.`Logintud`
FROM `agente_venta` 
	LEFT JOIN `usuarios` ON `agente_venta`.`id_Usuario` = `usuarios`.`id_Usuario` 
	LEFT JOIN `zonas` ON `agente_venta`.`id_Zona` = `zonas`.`id_Zona` WHERE (Rol='Agente' ||Rol='Comercialización')  AND Estatus = 'Activo';";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Construir un array con los datos de las zonas
    $zonas = array();

    // Iterar sobre los resultados y agregarlos al array
    while ($row = $result->fetch_assoc()) {
        $zonas[] = array(
            'nombre' => $row['Nombre'],
            'apellido' => $row['Apellido_Paterno'],
            'latitud' => $row['Latitud'],
            'longitud' => $row['Logintud']
        );
    }
    
    // Devolver los datos en formato JSON
    header('Content-Type: application/json');
    echo json_encode(['zonas' => $zonas]);
}
$conn->close();
?>