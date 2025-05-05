<?php
    session_start();
    if (isset($_SESSION['alerta'])) {
        echo " 
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script>document.addEventListener('DOMContentLoaded', function() {
            swal('Oops', '" . $_SESSION['alerta'] . "', 'error');
        });</script>";
        unset($_SESSION['alerta']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css?v=1.0"> 
   

    <!-- LIMPIAR LA CACHË DEL NAEADOR DE MANERA AUTOMATICA -->

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

     <!--Script para mandar llamar iconos desde la nube-->
     <script src="https://kit.fontawesome.com/6a4e8ddd92.js" crossorigin="anonymous"></script>
     <link rel="shortcut icon" href="Imagenes/blanco.png"">
     <!-- API fuentes -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" rel="stylesheet">

    <title>Login</title>
</head>
<body>
    
        <section class="padre">
            <section class="logo">
                <section class="eslogan">SISTEMA WEB DE CITAS</section>
                <section class="img_logo"></section>
                <section class="enlaces orden">
                    <a href="https://www.facebook.com/aspersorasarsaro?mibextid=LQQJ4d"><i class="fa-brands fa-facebook fa-2xl"></i></a>
                   <a href="https://www.instagram.com/aspersoras_arsaro/"><i class="fa-brands fa-instagram fa-2xl"></i></a>
                </section>
            </section>

            <section class="datos">
                <section class="bienvenido">¡Bienvenido!</section>
                <!--------------------------------------- FORMULARIO----------------------------------->
                <form id="login" name = "login" method="post" action="PHP/BD/Loggear.php">
                <section class="entradas">
                    <section class="usr-padre">
                        <input class="user" type="text" class="username" placeholder="Usuario" id="user" name="user"
                         autocomplete="current-username" required> 
                        <i class="fa-solid fa-user fa-xl icon-user"></i>
                    </section>
                   
                    <section>
                        <input class="contra" type="password" class="password" placeholder="Contraseña" id="password"
                         autocomplete="current-password" name="password" required>
                         <i class="fa-solid fa-key fa-xl icon-pass"></i>
                    </section>
                </section>
                
              <button class="btnlogin" type="submit">
                    
                    INGRESAR 
                    <i class="fa-solid fa-right-to-bracket fa-2xl"></i>
                   
                </button>
                </form>
                <!-- -----------------------------------Fin formulario --> 

                <section class="registrar">
                    ¿No tienes cuenta? <a href="Registro_Cliente.html">Regístrate aquí</a>
                </section>

            </section>
            
         </section>
    
    
</body>
</html>