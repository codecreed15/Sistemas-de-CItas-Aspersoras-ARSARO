<?php
include_once('../PHP/BD/Conexion.php');//Mando a llamar la clase
$ob=new conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nombre']; 
    $apep = $_POST['apep']; 
    $apem = $_POST['apem'];
    $telefono = $_POST['tel'];
    $correo = $_POST['email']; 
    $user= $_POST['user'];
    $pass = $_POST['contra'];
    $rol = $_POST['selectOptions'];

    // Manejo de la imagen
    $nombre_archivo = $_FILES['user_img']['name'];
    $tipo_archivo = $_FILES['user_img']['type'];
    $tamanio_archivo = $_FILES['user_img']['size'];
    $ruta_archivo = $_FILES['user_img']['tmp_name'];

    // Nuevo nombre de la imagen
    $nuevo_nombre_archivo = "$name $apep $apem.jpg"; // Reemplaza con el nuevo nombre deseado

    // Ruta de destino con el nuevo nombre
    $directorio_destino = "../Imagenes/Usuarios/" . $nuevo_nombre_archivo;

    // Mueve la imagen al directorio deseado con el nuevo nombre
    move_uploaded_file($ruta_archivo, $directorio_destino);

    //llamo el metodo para registrar los datos
    $ob->altas_users($name, $apep, $apem, $telefono, $correo,
    $user,$pass,$rol, $nuevo_nombre_archivo);

}
?>