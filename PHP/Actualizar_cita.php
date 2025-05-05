<?php

include_once('../PHP/BD/Conexion.php');//Mando a llamar la clase
$ob=new conexion(); //instanccio el objeto

//recibe los datos del javascript
$id_php =  $_POST['cita'];
$estatus_php = $_POST['estatus'];
$servicio_php = $_POST['tipo'];
$fecha_php = $_POST['fecha'];
//llamo el metodo para registrar los datos
$ob->update_cita($id_php,$estatus_php,$servicio_php,$fecha_php);

?>