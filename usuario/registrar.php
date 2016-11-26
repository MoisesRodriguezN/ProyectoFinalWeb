<?php
  session_start(); // Inicio de sesión
  
  if(!isset($_SESSION['logueadoUser'])) {
    $_SESSION['logueadoUser'] = false;
  } //Sesión Usuarios
  
  if($_SESSION['logueadoUser'] == TRUE) {
    header("location:../usuario/index.php");
  } 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Registro de clientes</title>
  </head>
  <body>
      <?php
        try {
          $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }
        
        $numMaximoCliente = $conexion->query("SELECT max(codCliente) AS codCliente FROM cliente");
        
        $codAux = $numMaximoCliente->fetchObject();
        $codClienteRegistro = $codAux->codCliente+1;
        //Comprueba que no hay ningún campo vacio
        if(empty($_POST[usuario] && $_POST[clave] && $_POST[dni] && $_POST[nombre] && $_POST[apellido1]
          && $_POST[apellido2])){
          echo "Debes rellenar todos los campos";
          header( "refresh:30;url=registro.php" ); //Redirecciona  a la página principal.
        }else{
          echo $codClienteRegistro;
          $insercion = "INSERT INTO cliente (codCliente, DNI, nombre, apellido1, "
            . "apellido2) VALUES ('$codClienteRegistro',"
            . "'$_POST[dni]','$_POST[nombre]' ,'$_POST[apellido1]' ,"
            . "'$_POST[apellido2]')";
          $conexion->exec($insercion);
          echo $insercion;
          
          $insercion2 = "INSERT INTO login (usuario, clave, rol, codCliente)"
            . "  VALUES ('$_POST[usuario]',"
            . "'$_POST[clave]','usuario' ,'$codClienteRegistro')";
          $conexion->exec($insercion2);
          echo "Cliente dado de alta correctamente.";
          header( "refresh:300;url=login.php" );
          $conexion->close();
            
        }
          ?> 
  </body>
</html>