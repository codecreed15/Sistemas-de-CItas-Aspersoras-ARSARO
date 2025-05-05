<?php
session_start();
$id_Cita = $_GET['id'];
echo '<script> console.log('.$id_Cita.');</script>';
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // El usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión o mostrar un mensaje de error
    header('Location: ../index.php'); // Cambia "login.php" por la ruta de tu página de inicio de sesión
    exit();
} else {  
    $usuario = $_SESSION['usuario'];
    $nombre = $_SESSION['misesion'];
    
    if ($nombre['Rol'] == "Cliente" || $nombre['Rol'] == "Admin") {
        // El usuario tiene un rol distinto a "Cliente", redirigirlo a la página de inicio de sesión
        header('Location: ../index.php'); // Cambia "login.php" por la ruta de tu página de inicio de sesión
        exit();
    }

    echo '<script>console.log('.$nombre['id_Usuario'].')</script>';

    $conn = new mysqli('localhost', 'id20807182_root', 'Bgutierrez2018.', 'id20807182_arsaro');
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM cita WHERE id_Cita = $id_Cita";
    $result = $conn->query($sql);

    // Verificar si se encontró el registro
    if ($result->num_rows > 0) {
        // Obtener los datos del registro
        $row = $result->fetch_assoc();

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "No se encontró el registro";
    } 
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
    <title>Actualizar cita</title>
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
            <li><a href="zonas.phpl"><i class="fa-sharp fa-solid fa-location-dot "></i>Zonas</a></li>
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

            <article class="datos_actualizar">
              <form id="form_registro" name="form_registro" action="../PHP/Actualizar_cita.php" method="POST" enctype="multipart/form-data">
                <p> <h2>Folio:   <label for=""><?php echo $id_Cita ?></label></h2></p> </br>

                <article>
                  <input type="number" id="cita" name="cita" value="<?php echo $id_Cita ?>" style="display:none">
                </article>

                <article class="select_estatus">
                  <h2>Seleccione el estatus</h2>
                  <select class="selector-estatus" id="estatus" name="estatus">
                      <option value="Nuevo" <?php if ($row['Estatus'] == 'Nuevo') echo 'selected'; ?>> Nuevo</option>
                      <option value="Proceso" <?php if ($row['Estatus'] == 'Proceso') echo 'selected'; ?>> Proceso</option>
                      <option value="Terminado" <?php if ($row['Estatus']== 'Terminado') echo 'selected'; ?>> Terminado</option>
                      <option value="Cancelado" <?php if ($row['Estatus'] == 'Cancelado') echo 'selected'; ?>> Cancelado</option>
                  </select>
                 </article>

              <article class="select_servicio">
                <h2>Seleccione el servicio</h2>
                <select class="selector-sericio" id="tipo" name="tipo">
                    <option value="Adquisición de una nueva aspersora" 
                    <?php if ($row['Tipo_Servicio'] == 'Adquisición de una nueva aspersora') echo 'selected'; ?>> 
                    Adquisición de una nueva aspersora</option>

                    <option value="Demostración de aspersoras"
                    <?php if ($row['Tipo_Servicio'] == 'Demostración de aspersoras') echo 'selected'; ?>> 
                    Demostración de aspersoras</option>

                    <option value="Mantenimiento de aspersoras"
                    <?php if ($row['Tipo_Servicio'] == 'Mantenimiento de aspersoras') echo 'selected'; ?>> 
                    Mantenimiento de aspersoras</option>

                    <option value="Visita de seguimiento"
                    <?php if ($row['Tipo_Servicio'] == 'Visita de seguimiento') echo 'selected'; ?>>
                    Visita de seguimiento</option>

                    <option value="Entrega de aspersora"
                     <?php if ($row['Tipo_Servicio'] == 'Entrega de aspersora') echo 'selected'; ?>>
                    Entrega de aspersora</option>

                    </select>
            </article>

            <article class="fecha">
              <h2>Fecha: </h2> </br>
              <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d', strtotime($row['Fecha'])); ?>">
            </article>

            <article class="buton_agregar2">
              <button class="btnlogin2" type="submit">
                  Actualizar
                  <i class="fa-solid fa-pen-to-square"></i>
              </button>
          </article>
      </form> 
        </article>



          </section>  
        </section>
    <!-- Fin contenido -->
</body>
</html>