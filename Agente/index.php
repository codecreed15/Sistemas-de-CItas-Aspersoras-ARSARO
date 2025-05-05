<?php
  session_start();

  // Verificar si el usuario ha iniciado sesión
  if ((!isset($_SESSION['usuario']) )) {
      // El usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión o mostrar un mensaje de error
      header('Location: ../index.php'); // Cambia "login.php" por la ruta de tu página de inicio de sesión
      exit();
  }else{  
    $usuario = $_SESSION['usuario'];
    $nombre = $_SESSION['misesion'];
    
    if ($nombre['Rol'] == "Cliente" || $nombre['Rol'] == "Admin" ) {
      // El usuario tiene un rol distinto a "Cliente", redirigirlo a la página de inicio de sesión
      header('Location: ../index.php'); // Cambia "login.php" por la ruta de tu página de inicio de sesión
      exit();
    }

    echo '<script>console.log('.$nombre['id_Usuario'].')</script>';

    $conn = new mysqli('localhost', 'id20807182_root', 'Bgutierrez2018.', 'id20807182_arsaro');
    
    
    $sql = "SELECT `cita`.`id_Cita`, `cita`.`Estatus`, `cita`.`Tipo_Servicio`, `cita`.`Fecha`, `cita`.`id_Agente`, 
    `cita`.`id_Cliente`, `agente_venta`.`id_Agente`, `agente_venta`.`id_Usuario`, `cliente`.`Nombre`, `cliente`.
    `Apellido_Paterno` FROM `cita` 
    INNER JOIN `agente_venta` ON `cita`.`id_Agente` = `agente_venta`.`id_Agente` 
    INNER JOIN `cliente` ON `cita`.`id_Cliente` = `cliente`.`id_Cliente` WHERE id_Usuario = 2;";
    $result = $conn->query($sql);

    // $sql2 = "SELECT COUNT(*) as total FROM cita WHERE id_Cliente = '$id_Cliente'";
    // $result2 = $conn->query($sql2);
    
    // if ($result2->num_rows > 0) {
    //     $row2 = $result2->fetch_assoc();
    //     $total = $row2['total'];
    //     // echo "Total de citas para el cliente con ID $id_Cliente: $total";
    // } else {
    //     // echo "No se encontraron citas para el cliente con ID $id_Cliente";
    // }

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
    <title>Inicio</title>
    <script type="text/javascript" src="../JS/Actualizar_cita.js"></script>
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
        <section class="contenido">
            <section class="contenido_hijo">
                <article class="Logo"></article>
                
                <article class="Tabla">
                    <table class="tabla-citas">
                        <thead class="campos">
                          <tr>
                            <th>Folio</th>
                            <th>Estatus</th>
                            <th>Servicio</th>
                            <th>Fecha</th>
                            <th>Nombre Cliente</th>
                            <th>Evidencia</th>
                            <th>Acción</th>
                          </tr>
                        </thead>

                        <tbody class="cuerpo-citas">
                        <?php
                          while($row=$result->fetch_assoc()){
                          echo '<tr>
                            <td>' .$row['id_Cita']. '</td>
                            <td>' .$row['Estatus']. '</td>
                            <td>' .$row['Tipo_Servicio']. '</td>
                            <td>' .$row['Fecha']. '</td>
                            <td>' .$row['Nombre']. ' ' .$row['Apellido_Paterno']. '</td>
                            <td>
                              <button class="botones_agente" onclick="evidencia(' . $row["id_Cita"] . ')">                         
                                  Evidencia
                              </button>
                            </td>

                            <td>
                              <button class="botones_agente2" onclick="editarRegistro(' . $row["id_Cita"] . ')">           
                                <i class="fa-solid fa-pen-to-square"></i>
                              </button>
                            </td>
                          </tr>';
                        }
                        $conn->close();
                        ?>
                          

                        </tbody>
                      </table>
                      
                </article>
            </section>  
        </section>
    <!-- Fin contenido -->
</body>
</html>