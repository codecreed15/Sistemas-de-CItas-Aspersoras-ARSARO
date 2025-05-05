<?php
include_once('../PHP/BD/Conexion.php');//Mando a llamar la clase
$ob=new conexion();


    $Direccion = $_POST['Direccion']; 
    $Latitud= $_POST['Latitud']; 
    $Longitud = $_POST['Longitud'];

    $ob->alta_zona($Direccion,$Latitud,$Longitud);
   
?>