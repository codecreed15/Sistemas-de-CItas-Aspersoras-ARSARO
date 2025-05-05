<?php ob_start();
if(isset($_GET['archivo'])){
    $archivo = $_GET['archivo'];
    $ruta_archivo = '../Evidencias/'.$archivo;  // Reemplaza con la ruta correcta del archivo en el servidor
    
    // Verificar si el archivo existe
    if (file_exists($ruta_archivo)) {
        $extension = pathinfo($ruta_archivo, PATHINFO_EXTENSION);
        $nombre_tem = strstr($archivo, '.pdf', true);
        $nuevo_nombre = $nombre_tem.'.' . $extension;
        
        // Limpiar el búfer de salida
        ob_clean();
        
        // Configurar las cabeceras para la descarga
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $nuevo_nombre);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($ruta_archivo));
        
        // Leer y enviar el archivo al navegador en fragmentos
        $handle = fopen($ruta_archivo, 'rb');
        while (!feof($handle)) {
            echo fread($handle, 8192);
            ob_flush();
            flush();
        }
        
        fclose($handle);
        exit;
    } else {
        echo '<script>console.log("El archivo no existe");</script>';
        echo "<script>window.location.href = '../Admin/index.php';</script>";
    }
} else {
    echo 'No se especificó el archivo a descargar.';
}
?>