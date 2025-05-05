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
    <title>Evidencia</title>
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

           <article class="Logo"></article>
           
              <article class="selecciona_archivo">
                <form action="../PHP/Upload.php" method="post" enctype="multipart/form-data">
               
                  <input type="number" id="id" name="id" value="<?php echo $id_Cita ?>" Style="display:none">
               

                <div class="input_archivo">
                  <h1>Suba un docuemento en PDF </h1>
                  <br>
                  <input type="file" placeholder="Selecciona un archivo" name="archivo" accept="application/pdf">
                </div>
                <!-- <section class="personales">
                  <article class="select_servicio">
                      
                      <select id="selectOptions" name="selectOptions" class="selector-sericio">
                          <option value="">--Seleccione el folio de la cita-</option>
                          <option value=""> Admin</option>
                          <option value=""> Comercialización</option>
                          <option value=""> Agente de venta</option>
                          </select>
                  </article>
                  
              </section> -->

                <article class="buton_agregar2">
                  <button class="btnlogin2" type="submit">
                      subir
                      <i class="fa-solid fa-arrow-up-from-bracket"></i>
                  </button>
              </article>
            </form>
              </article>
            
              

          </section>  
        </section>
    <!-- Fin contenido -->
</body>
</html>