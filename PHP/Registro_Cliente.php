<?php

include_once('../PHP/BD/Conexion.php');//Mando a llamar la clase
$ob=new conexion(); //instanccio el objeto


//recibe los datos del javascript
    $nombre_php= $_POST['nombrejs'];
	$apellido_p_php= $_POST['apellido_pjs'];
    $apellido_m_php= $_POST['apellido_mjs'];
    $telefono_php = $_POST['telefonojs'];
    $organizacion_php = $_POST['organizacionjs'];
    $calle_php = $_POST['callejs'];
    $ciudad_php = $_POST['ciudadjs'];
    $estado_php = $_POST['estadojs'];
    $CP_php = $_POST['cpjs'];
    $Correo_php = $_POST['correojs'];
    $Usuario_php = $_POST['usuariojs'];
    $Contrasena_php = $_POST['contrasenajs'];

    //llamo el metodo para registrar los datos
    $ob->altas_Clientes($nombre_php, $apellido_p_php, $apellido_m_php, $telefono_php, $organizacion_php,
    $calle_php,$ciudad_php,$estado_php, $CP_php,$Correo_php,$Usuario_php,$Contrasena_php);
?>