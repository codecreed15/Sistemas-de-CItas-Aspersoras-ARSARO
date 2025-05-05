<?php
  session_start();

  // Verificar si el usuario ha iniciado sesión
  if (!isset($_SESSION['usuario'])) {
      // El usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión o mostrar un mensaje de error
      header('Location: ../index.php'); // Cambia "login.php" por la ruta de tu página de inicio de sesión
      exit();
  }else{
    
    $usuario = $_SESSION['usuario'];
    $nombre = $_SESSION['misesion'];

    if ($nombre['Rol'] == "Cliente" || $nombre['Rol'] == "Agente" || $nombre['Rol'] == "Comercialización") {
        
      // El usuario tiene un rol distinto a "Cliente", redirigirlo a la página de inicio de sesión
      header('Location: ../index.php'); // Cambia "login.php" por la ruta de tu página de inicio de sesión
      exit();
    }
  }

?></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Inicio.css?v=1.0"> 
    <link rel="stylesheet" href="../CSS/Registro.css?v=1.0"> 

    <!-- LIMPIAR LA CACHË DEL NAEADOR DE MANERA AUTOMATICA -->

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache"> 

     <!--Script para mandar llamar iconos desde la nube-->
     <script src="https://kit.fontawesome.com/6a4e8ddd92.js" crossorigin="anonymous"></script>
     <link rel="shortcut icon" href="../Imagenes/blanco.png"">
     <!-- API fuentes -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" rel="stylesheet">
    <title>Agregar usuario</title>
    
</head>
<body >
  
   
    <!-- Inicio header -->
        <header>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" > 
            <i class="fa-solid fa-bars"> </i> 
              Menú 
        </label>
        
        <nav id="sidebar">
          <ul>
          <li><a href="index.php"><i class="fa-solid fa-house"></i>Inicio</a></li>
            <li><a href="zonas.php"><i class="fa-sharp fa-solid fa-location-dot "></i>Zonas</a></li>
            <li><a href="usuario.php"><i class="fa-solid fa-user  icon-user"></i>Usuarios</a></li>
            <li><a href="cliente.php"><i class="fa-solid fa-user  icon-user"></i>Clientes</a></li>
            <li><a href="Agente.php"><i class="fa-solid fa-user  icon-user"></i>Agente de venta</a></li>
          </ul>
        </nav>

        <section class="Logout"><a href="../PHP/BD/Salir_sesion.php""> <?php echo  
        $nombre['Nombre']." ".$nombre['Apellido_Paterno']." ".$nombre['Apellido_Materno'] ?>  
        ___Salir</a> </section> 
    </header>
        <!-- Fin header -->

        <!-- Contenido -->
        
       <section class="padre">
          <section class="logo">
              <section class="eslogan">REGISTRO DE DATOS</section>
              <section class="img_logo"></section>
          </section>
          <form id="form_registro" action="../PHP/Registro_user.php" method="POST" enctype="multipart/form-data">
              <section class="datos">
  
                  <LAbel> Datos personales</label><br>
                  <section class="personales">
                      <div>
                          <input type="text" id="nombre" name="nombre" placeholder="Nombre" required><i class="fa-solid fa-user fa-xl"></i>
                      </div>
                      <div>
                          <input type="text" id="apep" name="apep" placeholder="Apellido Paterno" required><i class="fa-solid fa-user fa-xl"></i>
                       </div>
                      <div>
                          <input type="text" id="apem" name="apem" placeholder="Apellido Materno" required><i class="fa-solid fa-user fa-xl"></i>
                      </div>
                      <div>
                          <input type="number" id="tel" name="tel" placeholder="Teléfono" required> <i class="fa-solid fa-mobile-button fa-2xl"></i>
                      </div>
                      </section>
                      <br>
  
                  
  
                  <label> Datos electrónicos</label><br>
                  <section class="personales">
                      <div>
                          <input type="email" id="email" name="email" placeholder="Correo" required><i class="fa-solid fa-envelope fa-2xl"></i>
                      </div>
                      <div>
                          <input type="text" id="user" name="user" placeholder="Usuario" required  autocomplete="current-username"><i class="fa-solid fa-user fa-2xl "></i>
                      </div>
                      <div>
                          <input type="password" id="contra" name="contra" placeholder="Contraseña" required autocomplete="current-password"><i class="fa-solid fa-key fa-2xl" ></i><br>
                       </div>
                  </section>
                  <br>

                  
                  <br>
                  <br>

                  <section class="personales">
                    <div>
                        <img src="../Imagenes/Imagen user.png">
                    </div>
                    <div>
                        <label>Seleccione una imgen png, jpg, jpeg</label>
                        <input type="file"  name="user_img" placeholder="Usuario imagen" accept="image/*" >
                    </div>
                    
                </section>

                <section class="personales">
                    <article class="select_servicio">
                        
                        <select id="selectOptions" name="selectOptions" class="selector-sericio">
                            <option value="Admin">--Seleccione el rol del usuario-</option>
                            <option value="Admin"> Admin</option>
                            <option value="Comercialización"> Comercialización</option>
                            <option value="Agente"> Agente de venta</option>
                            </select>
                    </article>
                    
                </section>
  
                  <section class="button">
                  <button class="btnlogin" type="submit">
                          Registrar
                          <i class="fa-solid fa-circle-plus fa-2xl"></i>
                      </button>
                      </section>
              </section>
   
          </form>
  
      </section> 
     
    <!-- Fin contenido -->
</body>
</html>