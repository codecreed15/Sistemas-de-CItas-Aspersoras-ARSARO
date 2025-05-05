<?php
include_once('../PHP/BD/Conexion.php');//Mando a llamar la clase
$ob=new conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_Cita = $_POST['id'];

    // Manejo del archivo
    $nombre_archivo = $_FILES['archivo']['name'];
    $tipo_archivo = $_FILES['archivo']['type'];
    $tamanio_archivo = $_FILES['archivo']['size'];
    $ruta_archivo = $_FILES['archivo']['tmp_name'];

    // Directorio de destino para almacenar los archivos
    $directorio_destino = "../Evidencias/";

    // Generar un nuevo nombre de archivo único
    $nuevo_nombre_archivo = $id_Cita . " " . basename($nombre_archivo);

    // Ruta completa de destino con el nuevo nombre de archivo
    $ruta_destino = $directorio_destino . $nuevo_nombre_archivo;

    // Mover el archivo al directorio de destino
    if (move_uploaded_file($ruta_archivo, $ruta_destino)) {
        // El archivo se ha subido exitosamente
        date_default_timezone_set('America/Mexico_City'); // Establecer la zona horaria de México
        $fecha = date('Y-m-d H:i:s');

        // Llama el método para registrar los datos
        try {
            $ob->subir_archivo($id_Cita, $nuevo_nombre_archivo, $fecha);
            //echo "El archivo se ha subido correctamente.";
        } catch (Exception $e) {
            //echo "Error al registrar los datos: " . $e->getMessage();
        }
    } else {
        echo "<script> 
        window.location.href = '../Agente/index.php';</script>";
    }
}
?>