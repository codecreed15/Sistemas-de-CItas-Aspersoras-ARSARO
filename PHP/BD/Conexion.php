
<?php

class conexion{//inicio clase

/// se obtienen datos para ue haga la conexión adecuada
    private $host='localhost';
    private $pass='Bgutierrez2018.';
    private $usaurio ='id20807182_root'; 
    private $db='id20807182_arsaro';
    public $conec;

    public function __construct(){//Constructor
        try{
        $this->conec =mysqli_connect($this->host, $this->usaurio, $this->pass, $this->db);//hará la conexión para eso debeeos inicialiar las variables y conectar con el mysqli
        //echo "Conexion exitosa\n";
        }catch(Exception $e){
            echo " 
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script>document.addEventListener('DOMContentLoaded', function() {
            swal('Error', ' No se pudo establecer la conexión ', 'error');
        });</script>";
        }
    }


//--------------------------------funcione para hacer setencias de mysql-*-------------------------------

// _-------------------------Metodos Login---------------------------------------------------------------------

    public function altas_Clientes($nombre, $ape_p, $ape_m, $tel, $empresa, $Direccion, $ciudad,
    $Estado, $cp, $correo, $usaurio, $contra){ 

    //consulta primero
    $sql= "SELECT * FROM cliente WHERE Usuario = '$usaurio'";
    $sql2= "SELECT * FROM usuarios WHERE Usuario = '$usaurio'";
   
        //le asigna la consulta
         $result  = mysqli_query($this->conec, $sql);
         $result2  = mysqli_query($this->conec, $sql2);
         
            if ((mysqli_num_rows($result) > 0)||(mysqli_num_rows($result2) > 0)) {//si es verdadeo
               
                // El usuario y contraseña ya existen
                echo " 
                <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>document.addEventListener('DOMContentLoaded', function() {
                    swal('Oops', '¡Advertencia: Ya existe el usuario intente con otro por favor!', 'error');
                });</script>";
                
                
                } else {

                // Insertar los datos en la base de datos
                $sql = "INSERT INTO cliente(Nombre,Apellido_Paterno,Apellido_Materno,Direccion,Ciudad,Estado,
                Codigo_postal,Correo,Usuario,Contrasena,Huerta_Empresa,Telefono,Rol,Estatus) VALUES ('$nombre','$ape_p'
                ,'$ape_m','$Direccion','$ciudad','$Estado','$cp','$correo','$usaurio',
                '$contra','$empresa','$tel','Cliente','Activo')";
                

                if ($this->conec ->query($sql) === TRUE) {
                    // Confirmar la operación
                    echo "Datos registrados correctamente";
                  

                } else {
                    
                    $mensaje = "Error: " . $sql . "<br>" . $this->conec ->error;
                    echo "  <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>document.addEventListener('DOMContentLoaded', function() {
                        swal('Oops', '".$mensaje."', 'error');
                    });</script>";
                }
                $this->conec ->close();
            }     
    }//Fin altas clientes

    public function altas_users($nombre, $ape_p, $ape_m, $tel, $correo, $usaurio, $contra, $rol, $nombre_imagen){ 

    //consulta primero
    $sql= "SELECT * FROM cliente WHERE Usuario = '$usaurio'";
    $sql2= "SELECT * FROM usuarios WHERE Usuario = '$usaurio'";
   
        //le asigna la consulta
         $result  = mysqli_query($this->conec, $sql);
         $result2  = mysqli_query($this->conec, $sql2);
         
            if ((mysqli_num_rows($result) > 0)||(mysqli_num_rows($result2) > 0)) {//si es verdadeo 
                // El usuario y contraseña ya existen
                
                echo "<script>alert('¡Advertencia. Ya existe el usuario en el sistema!.');</script>";
                echo "<script>window.location.href = '../Admin/Alta_usuario.php';</script>";
                
               
                } else {

                // Insertar los datos en la base de datos
                $sql2 = "INSERT INTO usuarios(Nombre,Apellido_Paterno,Apellido_Materno,Correo,Usuario,Contrasena,
                Imagen,Telefono,Rol,Estatus) VALUES ('$nombre','$ape_p'
                ,'$ape_m','$correo','$usaurio','$contra','$nombre_imagen','$tel','$rol','Activo')";
                

                if ($this->conec ->query($sql2) === TRUE) {
                    // Confirmar la operación
                  echo "<script>alert('Se han subido correctamente los datos.');</script>";
                  echo "<script>window.location.href = '../Admin/usuario.php';</script>";

                } else {
                    echo "Error: " . $sql2 . "<br>" . $this->conec ->error;
                }
                $this->conec ->close();
            }     
    }//Fin altas usuarios

    public function alta_agente($Agente, $Zona){ 

        //consulta primero
        $sql= "SELECT * FROM agente_venta WHERE id_Usuario = '$Agente'";
            //le asigna la consulta
             $result  = mysqli_query($this->conec, $sql);
             
                if ((mysqli_num_rows($result) > 0)||(mysqli_num_rows($result) > 0)) {//si es verdadeo 
                    // El usuario y contraseña ya existen
                    
                    echo "<script>alert('¡Advertencia. Ya existe el usuario cubriendo la zona.');</script>";
                    echo "<script>window.location.href = '../Admin/Agente_Alta.php';</script>";                   
                    } else {
    
                    // Insertar los datos en la base de datos
                    $sql = "INSERT INTO agente_venta(id_Usuario,id_Zona) VALUES ('$Agente','$Zona')";
                    
                    if ($this->conec ->query($sql) === TRUE) {
                        // Confirmar la operación
                      echo "<script>alert('Se han subido correctamente los datos.');</script>";
                      echo "<script>window.location.href = '../Admin/Agente.php';</script>";
    
                    } else {
                        echo "Error: " . $sql . "<br>" . $this->conec ->error;
                    }
                    $this->conec ->close();
                }     
        }//Fin altas agentes


        public function alta_zona($direccion, $latitud,$longitud){ 

            //consulta primero
            $sql= "SELECT * FROM zonas WHERE Zona = '$direccion'";
                //le asigna la consulta
                 $result  = mysqli_query($this->conec, $sql);
                 
                    if ((mysqli_num_rows($result) > 0)||(mysqli_num_rows($result) > 0)) {//si es verdadeo 
                        // El usuario y contraseña ya existen
                        
                        echo "<script>alert('¡Advertencia. Ya la zona.');</script>";
                        echo "<script>window.location.href = '../Admin/zonas.php';</script>";                   
                        } else {
        
                        // Insertar los datos en la base de datos
                        $sql = "INSERT INTO zonas (Zona,Latitud,Logintud) VALUES ('$direccion','$latitud','$longitud')";
                        
                        if ($this->conec ->query($sql) === TRUE) {
                            // Confirmar la operación
                          echo "<script>alert('Se han subido correctamente los datos.');</script>";
                          echo "<script>window.location.href = '../Admin/zonas.php';</script>";
        
                        } else {
                            echo "Error: " . $sql . "<br>" . $this->conec ->error;
                        }
                        $this->conec ->close();
                    }     
            }//Fin alta_zona
    

        public function subir_archivo($id, $name, $fecha){ 

            //consulta primero
            $sql= "SELECT * FROM evidencia WHERE id_Cita= $id";
           
                //le asigna la consulta
                 $result  = mysqli_query($this->conec, $sql);
                 
                    if ((mysqli_num_rows($result) > 0)) {//si es verdadeo 
                        // El usuario y contraseña ya existen
                        echo '  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    swal("Oops", "¡Advertencia. Ya existe el archivo en el sistema consulte con el administrador para hacer los cambios!.", "warning").then(function() {
                                        window.location.href = "../Agente/index.php";
                                    });
                                });
                            </script>';
                        } else {
        
                        // Insertar los datos en la base de datos
                        $sql2 = "INSERT INTO evidencia(id_Cita,Nombre_Archivo,Fecha) VALUES ('$id','$name'
                        ,'$fecha')";
                        
        
                        if ($this->conec ->query($sql2) === TRUE) {
                            // Confirmar la operación
                            echo '  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    swal("Success", "Se han subido correctamente el archivo.", "success").then(function() {
                                        window.location.href = "../Agente/index.php";
                                    });
                                });
                            </script>';
        
                        } else {
                            echo "Error: " . $sql2 . "<br>" . $this->conec ->error;
                        }
                        $this->conec ->close();
                    }     
            }//Fin alta archivo

        public function update_agente($id, $Zona){ 
        
                        // Insertar los datos en la base de datos
                        $sql = "UPDATE agente_venta set id_Zona = '$Zona' WHERE id_Agente='$id'";
                        
                        if ($this->conec ->query($sql) === TRUE) {
                            // Confirmar la operación
                          echo "<script>alert('Se han actualizado correctamente los datos.');</script>";
                          echo "<script>window.location.href = '../Admin/Agente.php';</script>";
        
                        } else {
                            echo "Error: " . $sql . "<br>" . $this->conec ->error;
                        }
                        $this->conec ->close();
                    // }     
            }//Fin altas agentes

    public function update($id_php,$nombre_php, $apellido_p_php, $apellido_m_php, $telefono_php,$Correo_php,
    $Usuario_php,$Contrasena_php,$rol_php,$estatus_php){

        $sentenciasql ="UPDATE usuarios set Nombre = '$nombre_php', Apellido_Paterno='$apellido_p_php', Apellido_Materno='$apellido_m_php'
        , Correo='$Correo_php', Usuario='$Usuario_php', Contrasena='$Contrasena_php' 
        , Telefono='$telefono_php' , Rol='$rol_php', Estatus='$estatus_php' WHERE id_Usuario='$id_php' ";

        try{
            $this->conec->query($sentenciasql);
            echo "<script>alert('Se han actualizado correctamente los datos.');</script>";
                echo "<script>window.location.href = '../Admin/usuario.php';</script>";
        }catch(Exception $th){
            echo "<script>alert('No se han subido correctamente los datos.');</script>";
            echo "<script>window.location.href = '../Admin/Actualizar.php';</script>";
        }
     }

     public function update_imagen($id_php,$nombre_imgen){

     $sentenciasql ="UPDATE usuarios set Imagen = '$nombre_imgen' WHERE id_Usuario='$id_php' ";

     try{
         $this->conec->query($sentenciasql);
         echo "<script>alert('Se han actualizado correctamente los datos.');</script>";
            echo "<script>window.location.href = '../Admin/usuario.php';</script>";
     }catch(Exception $th){
        echo "<script>alert('No se han subido correctamente los datos.');</script>";
        echo "<script>window.location.href = '../Admin/Actualizar.php';</script>";
     }
    }//fin actualizar imagen

    public function update_cliente($id_php, $estatus){
        $sentenciasql ="UPDATE cliente set Estatus = '$estatus' WHERE id_Cliente='$id_php' ";
        try{
            $this->conec->query($sentenciasql);
            echo "<script>alert('Se han actualizado correctamente los datos.');</script>";
            echo "<script>window.location.href = '../Admin/cliente.php';</script>";
        }catch(Exception $th){
           echo "<script>alert('No se han subido correctamente los datos.');</script>";
           echo "<script>window.location.href = '../Admin/ver_cliente.php';</script>";
        }
       }//fin actualizar cliente

       public function loggin($user, $pass)
       {
           // Consultar los datos en la base de datos y sacar un conteo del usuario
           $sql = "SELECT COUNT(*) as contar FROM cliente WHERE Usuario=? AND Contrasena=? AND Estatus='Activo'";
           $stmt = mysqli_prepare($this->conec, $sql);
           mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
           mysqli_stmt_execute($stmt);
           $resultado = mysqli_stmt_get_result($stmt);
           $array = mysqli_fetch_assoc($resultado);  // Le pasamos todos los datos de la consulta de una fila
       
           if ($array['contar'] > 0) {
               /* Otra consulta ahora para pasarle todos los datos de la columna */
               $sql2 = "SELECT * FROM cliente WHERE (Usuario=? AND Contrasena=?) AND Estatus='Activo'";
               $stmt2 = mysqli_prepare($this->conec, $sql2);
               mysqli_stmt_bind_param($stmt2, "ss", $user, $pass);
               mysqli_stmt_execute($stmt2);
               $resultado2 = mysqli_stmt_get_result($stmt2);
               $cliente = mysqli_fetch_assoc($resultado2);
       
               $_SESSION['usuario'] = $user;
               $_SESSION['misesion'] = $cliente; // Aquí se le asigna a una sesión todos los datos de la columna
               echo '<meta http-equiv="refresh" content="0; URL=/ARSARO_CITAS/Cliente/index.php">';
              // header('Location: /ARSARO_CITAS/Cliente/index.php');
           } else {
             
               $_SESSION['alerta'] = 'Usuario o contraseña incorrectos o el usuario no está activo. Por favor, inténtelo de nuevo.';
               echo '<meta http-equiv="refresh" content="0; URL=/ARSARO_CITAS/Cliente/index.php">';
               // header('Location: /ARSARO_CITAS/index.php');
           }
           $this->conec->close();
       }//Fin metodo loggin 

    public function loggin2($user,$pass){
         $sql = "SELECT COUNT(*) as contar from usuarios WHERE (Usuario=? AND Contrasena=?) AND Estatus='Activo'";
         $stmt = mysqli_prepare($this->conec, $sql);
         mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
         mysqli_stmt_execute($stmt);
         $resultado = mysqli_stmt_get_result($stmt);
         $array = mysqli_fetch_assoc($resultado);  
        
         if($array['contar']>0){
            $sql2 = "SELECT * FROM usuarios WHERE (Usuario=? AND Contrasena=?) AND Estatus='Activo'";
            $stmt2 = mysqli_prepare($this->conec, $sql2);
            mysqli_stmt_bind_param($stmt2, "ss", $user, $pass);
            mysqli_stmt_execute($stmt2);
            $resultado2 = mysqli_stmt_get_result($stmt2);
            $cliente = mysqli_fetch_assoc($resultado2);
           
            $_SESSION['usuario'] = $user;
            $_SESSION['misesion'] = $cliente; //aqui se le asigna a una session todos los datos de la clumna
            
                //Redirigir al usuario a la página correspondiente
            if ($_SESSION['misesion']['Rol']== 'Admin') {
           echo '<meta http-equiv="refresh" content="0; URL=/ARSARO_CITAS/Admin/index.php">';
               // header('Location: /ARSARO_CITAS/Admin/index.php');
            
            }else if($_SESSION['misesion']['Rol'] == 'Agente'||$_SESSION['misesion']['Rol']== 'Comercialización') {
                echo '<meta http-equiv="refresh" content="0; URL=/ARSARO_CITAS/Agente/index.php">';
               // header('Location: /ARSARO_CITAS/Agente/index.php');
            }else if($_SESSION['misesion']['Rol'] == 'Cliente') {
                echo '<meta http-equiv="refresh" content="0; URL=/ARSARO_CITAS/index.php">';
               // header('Location: /ARSARO_CITAS/index.php');
            }  else{
               // session_start();
               $_SESSION['alerta'] = 'Usuario o contraseña incorrectos o el usuario no está activo. Por favor, inténtelo de nuevo.';
               echo '<meta http-equiv="refresh" content="0; URL=/ARSARO_CITAS/index.php">';
            }           
        }
        else{
           $_SESSION['alerta'] = 'Usuario o contraseña incorrectos o el usuario no está activo. Por favor, inténtelo de nuevo.';
               echo '<meta http-equiv="refresh" content="0; URL=/ARSARO_CITAS/index.php">'; 
        }
        $this->conec->close();
    }//fin metodo login 2

   public function altas_cita($id_Cliente, $id_Agente,  $Servicio ){
        date_default_timezone_set('America/Mexico_City'); // Establecer la zona horaria de México
        $fecha = date('Y-m-d');
        $estatus = "Nuevo";
        $sql = "INSERT INTO cita (id_Agente, id_Cliente, Estatus, Tipo_Servicio, Fecha) VALUES (?, ?,'$estatus', ?, '$fecha')";
        $stmt = mysqli_prepare($this->conec, $sql);
        mysqli_stmt_bind_param($stmt, "iis", $id_Agente, $id_Cliente, $Servicio);
        mysqli_stmt_execute($stmt);
        
        // Verificar si la inserción fue exitosa
        if(mysqli_stmt_affected_rows($stmt) > 0){
            mysqli_stmt_close($stmt);
            echo ' 
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal("Success", "Cita creada", "success").then(function() {
                        window.location.href = "../Cliente/index.php";
                    });
                });
            </script>';
        exit();
        } else {
            mysqli_stmt_close($stmt);
            echo ' 
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal("Oops", "Error a crear cita", "error").then(function() {
                        window.location.href = "../Cliente/Agregar_cita.php";
                    });
                });
            </script>';
        exit();
        }
    }

    public function update_cita($id_php,$estatus_php,$servicio_php,$fecha_php){
        $sentenciasql ="UPDATE cita set EStatus = '$estatus_php', Tipo_Servicio='$servicio_php', Fecha='$fecha_php'
        WHERE id_Cita='$id_php' ";

     try{
         $this->conec->query($sentenciasql);
         echo ' 
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal("Success", "Se han actualizado correctamente los datos.", "success").then(function() {
                        window.location.href = "../Agente/index.php";
                    });
                });
            </script>';
         $this->conec->close();
     }catch(Exception $th){
         
         echo ' 
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal("Oops", "No se han subido correctamente los datos.", "error").then(function() {
                        window.location.href = "../Agente/Actualizar.php";
                    });
                });
            </script>';
        $this->conec->close();
     }
    }



}//Fin clase

?>