<?php

include_once('../PHP/BD/Conexion.php');//Mando a llamar la clase
$ob=new conexion(); //instanccio el objeto

//recibe los datos del javascript
$id_php =  $_POST['id'];
$estatus_php = $_POST['estatus'];

//llamo el metodo para registrar los datos
$ob->update_cliente($id_php,$estatus_php);

?>