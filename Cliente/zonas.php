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

    
    if ($nombre['Rol'] == "Admin" || $nombre['Rol'] == "Agente" || $nombre['Rol'] == "Comercialización" ) {
      // El usuario tiene un rol distinto a "Cliente", redirigirlo a la página de inicio de sesión
      header('Location: ../index.php'); // Cambia "login.php" por la ruta de tu página de inicio de sesión
      exit();
    }

   $conn = new mysqli('localhost', 'id20807182_root', 'Bgutierrez2018.', 'id20807182_arsaro');
    
    $sql = "SELECT `agente_venta`.`id_Agente`, `usuarios`.`Nombre`, `usuarios`.`Apellido_Paterno`, `usuarios`.`Apellido_Materno`,
    `usuarios`.`Estatus`,`usuarios`.`Imagen`,`usuarios`.`Rol`, `zonas`.`Zona`
    FROM `agente_venta` 
    LEFT JOIN `usuarios` ON `agente_venta`.`id_Usuario` = `usuarios`.`id_Usuario` 
    LEFT JOIN `zonas` ON `agente_venta`.`id_Zona` = `zonas`.`id_Zona` WHERE Estatus='Activo' AND (Rol='Agente'or Rol='Comercialización')";
    $result = $conn->query($sql);

    $conn->close();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Inicio.css?v=1.0"> 
   

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

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <title>Zonas</title>
    <!-- <script type="text/javascript" src="../JS/Inicio.js"></script> -->
</head>
<body >
  
   
    <!-- Inicio header -->
        <header>
        
        <label for="menu-toggle"  > 
            <a href="index.php" id="home"><i class="fa-solid fa-house"></i>Inicio</a>
        </label>
        
        
        <section class="Logout"><a href="../PHP/BD/Salir_sesion.php""> <?php echo  
        $nombre['Nombre']." ".$nombre['Apellido_Paterno']." ".$nombre['Apellido_Materno'] ?>  
        ___Salir</a> </section> 
    </header>
        <!-- Fin header -->

        <!-- Contenido -->
        

        <section class="contenido2">    
          <section class="contenido_hijo2">

           <article class="Logo"></article>

              <article class="Titulo">
                  <h2> Zonas de agentes de venta</h2>
              </article>

              <article id="myMap" style="height: 550px; width: 100%">
              </article>

          </section>  
        </section>
        <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
        integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
        crossorigin=""></script>
        <script src="../JS/Mapa.js"></script>
        
    <!-- Fin contenido -->
</body>
</html>