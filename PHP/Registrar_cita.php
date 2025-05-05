<?php

include_once('../PHP/BD/Conexion.php');//Mando a llamar la clase
$ob=new conexion(); //instanccio el objeto


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_Cliente = $_POST['id_Cliente']; 
    $id_Agente = $_POST['SelectorAgente']; 
    $Servicio= $_POST['SelectorServicio'];
    

    //llamo el metodo para registrar los datos
    $ob->altas_cita($id_Cliente, $id_Agente, $Servicio);

}
?>