<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Alta de clientes</title>
  </head>
  <body>
      <?php
        if ( $_SESSION['logueadoAdmin'] == true){
        try {
          $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }
        
        //Comprueba que no hay ningún campo vacio
        if(empty($_POST[codCliente] && $_POST[DNI] && $_POST[nombre] && $_POST[apellido1]
          && $_POST[apellido2])){
          echo "Debes rellenar todos los campos";
          header( "refresh:3;url=indexAdmin.php" ); //Redirecciona  a la página principal.
        }else{
          $consulta = $conexion->query("SELECT codCliente FROM cliente WHERE codCliente=".$_POST['codCliente']);

          if ($consulta->rowCount() > 0) {
            header( "refresh:3;url=indexAdmin.php" );
          ?>
            Ya existe un cliente con DNI <?= $_POST['dni'] ?><br>
            Por favor, vuelva al <a href="indexAdmin.php">panel de Administración del hotel</a>.
          <?php
          }else{
            $insercion = "INSERT INTO cliente (codCliente, DNI, nombre, apellido1, "
              . "apellido2) VALUES ('$_POST[codCliente]',"
              . "'$_POST[DNI]','$_POST[nombre]' ,'$_POST[apellido1]' ,"
              . "'$_POST[apellido2]')";
            $conexion->exec($insercion);
            echo "Cliente dado de alta correctamente.";
            header( "refresh:3;url=indexAdmin.php" );
            $conexion->close();
            }
        }
          ?> 
          <?php
            }else{
              echo "Debes iniciar sesión para poder entrar en esta zona";
              header("location:login.php");
            }
          ?>
  </body>
</html>