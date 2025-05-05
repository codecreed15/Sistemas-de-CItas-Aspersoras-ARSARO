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

        // Obtener el ID desde la URL
        $id = $_GET['id'];

        // Realizar la conexión a la base de datos (reemplaza los valores con los de tu configuración)
        $conn = new mysqli('localhost', 'id20807182_root', 'Bgutierrez2018.', 'id20807182_arsaro');

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consultar el registro por ID
        $sql = "SELECT * FROM cliente WHERE id_Cliente = $id";
        $result = $conn->query($sql);

        // Verificar si se encontró el registro
        if ($result->num_rows > 0) {
            // Obtener los datos del registro
            $row = $result->fetch_assoc();

            // Mostrar los datos en los campos del formulario
            $name = $row['Nombre'];
            $apep= $row['Apellido_Paterno'];
            $apem = $row['Apellido_Materno'];
            $Direccion = $row['Direccion'];
            $Ciudad = $row['Ciudad'];
            $Estadoo = $row['Estado'];
            $Codigo_postal = $row['Codigo_postal'];
            $telefono = $row['Telefono'];
            $Correo = $row['Correo']; 
            $user= $row['Usuario'];
            $pass = $row['Contrasena'];
            $Huerta_Empresa = $row['Huerta_Empresa'];
            $rol = $row['Rol'];
            $estatus =$row['Estatus'];

            // Cerrar la conexión a la base de datos
            $conn->close();
        } else {
            // Cerrar la conexión a la base de datos
            $conn->close();
            echo "No se encontró el registro";
        }        

    if ($nombre['Rol'] == "Cliente" || $nombre['Rol'] == "Agente" || $nombre['Rol'] == "Comercialización") {
      // El usuario tiene un rol distinto a "Cliente", redirigirlo a la página de inicio de sesión
      header('Location: ../index.php'); // Cambia "login.php" por la ruta de tu página de inicio de sesión
      exit();
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
    <title>Datos Cliente</title>
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
              <section class="eslogan">Datos Cliente</section>
              <section class="img_logo"></section>
          </section>
          <form id="form_registro" name="form_registro" action="../PHP/Actualizar_datos_cliente.php" method="POST" >
              <section class="datos">
  
                <LAbel> Datos personales</label><br>
                    <section class="personales">
                    <div>
                        
                        <input type="number" id="id" name="id"  placeholder="id" value="<?php echo $id;?>"  readonly>
                    </div>
                        <div>
                            <input type="text" id="nombre" name="nombre" placeholder="Nombre" 
                            required readonly value="<?php echo $name;?>">>
                            <i class="fa-solid fa-user fa-xl"></i>
                        </div>
                        <div>
                            <input type="text" id="apep" name="apep" placeholder="Apellido Paterno" required 
                            value="<?php echo $apep;?>" readonly><i class="fa-solid fa-user fa-xl"></i>
                         </div>
                        <div>
                            <input type="text" id="apem" name="apem" placeholder="Apellido Materno" required  
                            value="<?php echo $apem;?>"readonly><i class="fa-solid fa-user fa-xl"></i>
                        </div>
                        <div>
                            <input type="number" id="tel" name="tel" placeholder="Teléfono" required
                            value="<?php echo $telefono;?>" readonly> <i class="fa-solid fa-mobile-button fa-2xl"></i>
                        </div>
                        <div>
                            <input type="text" id="empresa" name="empresa" placeholder="Empresa/organización" required 
                            value="<?php echo $Huerta_Empresa;?>" readonly><i class="fa-solid fa-building fa-2xl"></i>
                        </div>
                        </section>
                        <br>
    
                     <label> Dirección</label><br>   
                     <section class="personales">
                        <div>
                            <input type="text" id="calle" name="calle" placeholder="Calle #, Colonia" required 
                            value="<?php echo $Direccion;?>" readonly><i class="fa-sharp fa-solid fa-location-dot fa-2xl"></i>
                        </div>
                        <div>
                            <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad" required 
                            value="<?php echo $Ciudad;?>" readonly> <i class="fa-solid fa-city fa-2xl"></i>
                        </div>
                        <div>
                            <input type="text" id="estado" name="estado" placeholder="Estado" required 
                            value="<?php echo $Estadoo;?>" readonly> <i class="fa-solid fa-city fa-2xl"></i>
                        </div>
                        <div>
                            <input type="text" id="codigo" name="codigo" placeholder="C.P/N.A" required 
                            value="<?php echo $Codigo_postal;?>" readonly> <i class="fa-solid fa-mailbox fa-2xl"></i>
                        </div>
                        </section>
                        <br>
    
                    <label> Datos electrónicos</label><br>
                    <section class="personales">
                        <div>
                            <input type="email" id="email" name="email" placeholder="Correo" required 
                            value="<?php echo $Correo;?>" readonly><i class="fa-solid fa-envelope fa-2xl"></i>
                        </div>
                        <div>
                            <input type="text" id="user" name="user" placeholder="Usuario" required 
                            value="<?php echo $user;?>" readonly><i class="fa-solid fa-user fa-2xl "></i>
                        </div>
                        <div>
                            <input type="text" id="contra" name="contra" placeholder="Contraseña" required 
                            value="<?php echo $pass;?>" readonly><i class="fa-solid fa-key fa-2xl"></i><br>
                         </div>
                    </section>

                <section class="personales">
                   

                <article class="select_servicio">
                        
                <select class="selector-sericio" id="estatus" name="estatus"> 
                      <option value="Activo" <?php if ($estatus == 'Activo') echo 'selected'; ?>>Activo</option>
                      <option value="Inactivo" <?php if ($estatus == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
                    </select>
                </article>
                    
                </section>
  
                  <article class="buton_agregar2">
                    <button class="btnlogin2" type="submit">
                          Actualizar
                          <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                  </article>
              </section>
   
          </form>
  
      </section> 
     
    <!-- Fin contenido -->
</body>
</html>