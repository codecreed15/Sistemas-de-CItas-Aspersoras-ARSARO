<?php

include_once('../PHP/BD/Conexion.php');//Mando a llamar la clase
$ob=new conexion(); //instanccio el objeto

//recibe los datos del javascript
$id_php =  $_POST['id'];
$nombre_php= $_POST['nombre'];
$apellido_p_php= $_POST['apep'];
$apellido_m_php= $_POST['apem'];
$telefono_php = $_POST['tel'];
$Correo_php = $_POST['email'];
$Usuario_php = $_POST['user'];
$Contrasena_php = $_POST['contra'];
$rol_php = $_POST['rol'];
$estatus_php = $_POST['estatus'];


if (!empty($_FILES['user_img']['name'])) {

    // Manejo de la imagen
    $nombre_archivo = $_FILES['user_img']['name'];
    $tipo_archivo = $_FILES['user_img']['type'];
    $tamanio_archivo = $_FILES['user_img']['size'];
    $ruta_archivo = $_FILES['user_img']['tmp_name'];

    // Nuevo nombre de la imagen
    $nuevo_nombre_archivo = "$nombre_php $apellido_p_php $apellido_m_php.jpg";

    // Ruta de destino con el nuevo nombre
    $directorio_destino = "../Imagenes/Usuarios/" . $nuevo_nombre_archivo;

    // Mueve la imagen al directorio deseado con el nuevo nombre
    move_uploaded_file($ruta_archivo, $directorio_destino);

    // Actualiza la imagen en la base de datos
    $ob->update_imagen($id_php, $nuevo_nombre_archivo);
}

//llamo el metodo para registrar los datos
$ob->update($id_php,$nombre_php, $apellido_p_php, $apellido_m_php, $telefono_php,$Correo_php,$Usuario_php,$Contrasena_php,
$rol_php,$estatus_php);

?>