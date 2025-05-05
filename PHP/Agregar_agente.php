<?php
    include_once('../PHP/BD/Conexion.php');//Mando a llamar la clase
    $ob=new conexion();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Agente = $_POST['selectAgente'];
        $Zona = $_POST['selectZona'];

        $ob->alta_agente($Agente, $Zona);
    }
?>