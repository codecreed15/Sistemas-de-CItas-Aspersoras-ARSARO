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

    $sql2 = "SELECT `agente_venta`.`id_Agente`, `usuarios`.`Nombre`, `usuarios`.`Apellido_Paterno`, `usuarios`.`Apellido_Materno`,
    `usuarios`.`Estatus`,`usuarios`.`Imagen`,`usuarios`.`Rol`, `zonas`.`Zona`
    FROM `agente_venta` 
    LEFT JOIN `usuarios` ON `agente_venta`.`id_Usuario` = `usuarios`.`id_Usuario` 
    LEFT JOIN `zonas` ON `agente_venta`.`id_Zona` = `zonas`.`id_Zona` WHERE Estatus='Activo' AND (Rol='Agente'or Rol='Comercialización')";
    $result2 = $conn->query($sql2);
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
    <title>Agregar cita</title>
    <!-- <script type="text/javascript" src="../JS/Inicio.js"></script> -->
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
                
                <article class="encabbezado">
                    <h1>Agentes de venta disponible</h1>      
                </article>
                
                <article class="carrusel">
                 
                <article class="contenido_cards">
                    <?php
                    while($row = $result->fetch_assoc()){
                    echo '<article class="card">
                              <img src="../Imagenes/Usuarios/'.$row['Imagen'].'" class="" alt="...">
                              <div class="card-body">
                                <h3 class="card-title">'.$row['Rol'].'</h3>
                                <label for="">'.$row['Nombre'].' '.$row['Apellido_Paterno'].' '.$row['Apellido_Materno'].'</label>
                                <label for="">'.$row['Zona'].'</label>
                              </div>
                    </article>';
                    }
                    
                    ?>
                    
                </article>
                </article>

                <form class="Selecciona_citas" method="POST" action="../PHP/Registrar_cita.php">
                <article >
                <article class="select_agente">
                        <input value ="<?php echo $nombre['id_Cliente']; ?>" style="display:none" id="id_Cliente" name="id_Cliente">
                    </article>

                    <article class="select_agente">
                        <h2>Seleccione un agente de venta</h2>
                        <select class="selector-agente" id="SelectorAgente" name="SelectorAgente" required>
                            <?php
                            echo '<option value="">--Seleccione un agente de acuerdo a su zona--</option>';
                            while($row2 = $result2->fetch_assoc()){
                            echo '<option value="'.$row2['id_Agente'].'">'.$row2['Nombre'].' '.$row2['Apellido_Paterno'].' '.$row2['Apellido_Materno'].' </option>';
                            }
                            $conn->close();
                            ?>
                        </select>
                    </article>

                    <article class="select_servicio">
                        <h2>Seleccione el servicio</h2>
                        <select class="selector-sericio" id="SelectorServicio" name="SelectorServicio" required>
                            <option value="Adquisición de una nueva aspersora"> Adquisición de una nueva aspersora</option>
                            <option value="Demostración de aspersoras"> Demostración de aspersoras</option>
                            <option value="Mantenimiento de aspersoras"> Mantenimiento de aspersoras</option>
                            <option value="Visita de seguimiento"> Visita de seguimiento</option>
                            <option value="Entrega de aspersora"> Entrega de aspersora</option>
                            </select>
                        </article>
                        <article class="buton_agregar2">
                            <button class="btnlogin2" type="submit">
                                Crear
                                <i class="fa-solid fa-circle-plus fa-2xl"></i>
                            </button>
                        </article>
                </article>       
                 </section>  
            </form>
        </section>
    <!-- Fin contenido -->
</body>
</html>