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
    // Obtener el usuario del clinetee
    $user = $_GET['Usuario'];
    
    if ($nombre['Rol'] == "Cliente" || $nombre['Rol'] == "Admin" ) {
      // El usuario tiene un rol distinto a "Cliente", redirigirlo a la página de inicio de sesión
      header('Location: ../index.php'); // Cambia "login.php" por la ruta de tu página de inicio de sesión
      exit();
    }

    $conn = new mysqli('localhost', 'id20807182_root', 'Bgutierrez2018.', 'id20807182_arsaro');
    $ide_agente= $nombre['id_Usuario'];//id_agente
    $sql2 = "SELECT * FROM agente_venta  WHERE id_Usuario = $ide_agente";
    $result2 = $conn->query($sql2);
    
    if ($result2) {
     
      $row2 = $result2->fetch_assoc();
      $id_agente = $row2['id_Agente'];
      
      $sql = "SELECT * FROM chat  WHERE (incoming_msg_iid	= $id_agente AND outgoing_msg_id = '$user') || (incoming_msg_iid	= '$user' AND outgoing_msg_id = $id_agente) ORDER BY id_Chat DESC";
      $result = $conn->query($sql);
      
  }   
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
    <title>Chat</title>
    
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
            <li><a href="chat.php"><i class="fa-sharp fa-solid fa-comments"></i>Chats</a></li>
          </ul>
        </nav>

        <section class="Logout"><a href="../PHP/BD/Salir_sesion.php""> <?php echo  
        $nombre['Nombre']." ".$nombre['Apellido_Paterno']." ".$nombre['Apellido_Materno'] ?>  
        ___Salir</a> </section> 
    </header>
        <!-- Fin header -->

        <!-- Contenido -->
        

        <section class="contenido2">    
          <section class="contenido_hijo2">

           <article class="Logo"></article>

              <article class="Panel">
                <?php
                  // Verificar si se obtuvieron resultados
                  if (mysqli_num_rows($result) > 0) {
                    // Iterar sobre los registros y mostrarlos
                    while ($row = mysqli_fetch_assoc($result)) {
                      $mensaje = $row['Mensaje']; // Supongamos que el campo se llama 'mensaje'
                      $remitente = $row['incoming_msg_iid'];
                      

                       if($remitente == $id_agente){
                         echo '<div class="contenedor-parrafo">';
                         echo '<p class="remitente"> Tú: </p><br>';
                         echo '<p class="remitente">' . $mensaje . '</p><br>';
                         echo '<p class="remitente fecha-texto">' . $row['fecha'] . '</p><br>';
                         echo '</div>';
                       }else if($remitente == $user){
                         echo '<div class="contenedor-parrafo2">';
                         echo '<p class="destinatario">'.$user.' </p><br>';
                         echo '<p class="destinatario">' . $mensaje . '</p><br>';
                         echo '<p class="destinatario fecha-texto2">' . $row['fecha'] . '</p><br>';
                         echo '</div>';
                       }
                       
                      
                    }
                  } else {
                    echo '<p>No se encontraron mensajes.</p>';
                  }
                ?>
              </article>

              <form id="message-form">
              <input type="text" class="outcoming_id" name="outcoming_id" value="<?php echo $user; ?>" hidden>
              <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $row2['id_Agente']; ?>" hidden>
              <article class="mennsaje">
              
              <input type="text" class="message" name="message" placeholder="Mensaje..." maxlength="250" requerided>
                
                <article class="buton_agregar2">
                    <button class="btnlogin2" >
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </article>

              </article>
              </form>
          </section>
          <script type="text/javascript" src="../JS/Agregar_msg.js"></script>  
    <!-- Fin contenido -->
</body>
</html>