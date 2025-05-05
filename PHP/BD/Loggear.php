<?php session_start();
    require ('Conexion.php');
    //inicamos sesión

    $ob=new conexion(); //instanccio el objeto

    //variables del formulario del loggin
    $usuario = $_POST['user'];
    $password = $_POST['password'];

    $ob->loggin($usuario,$password);
?>