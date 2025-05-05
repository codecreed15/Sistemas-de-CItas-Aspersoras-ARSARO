<?php session_start();//inicamos sesión
    require ('Conexion.php');
    $ob=new conexion(); //instanccio el objeto
    //variables del formulario del loggin
    $usuario = $_POST['user'];
    $password = $_POST['password'];

    $ob->loggin2($usuario,$password);
?>