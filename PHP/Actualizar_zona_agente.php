<?php
    include_once('../PHP/BD/Conexion.php');//Mando a llamar la clase
    $ob=new conexion();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Zona = $_POST['selectAgente'];
        $id = $_POST['id_agente'];

        $ob->update_agente($id, $Zona);
    }
?>