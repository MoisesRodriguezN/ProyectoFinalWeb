<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Reserva de habitación</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body class="fondoAzul">
      <?php
        if ( $_SESSION['logueadoAdmin'] == true){
        try {
          $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }
        
       /* $consulta = $conexion->query("SELECT * FROM cliente c "
        . "WHERE c.codCliente=\"$_POST[codCliente]\"");
        $reserva = $consulta->fetchObject();
        $accion = $_POST['accion'];*/
         
        $insercion = "INSERT INTO RESERVA (codCliente, codHabitacion,	fechaEntrada,	fechaSalida) VALUES ('$_POST[codCliente]',"
          . "'$_POST[codHabitacion]','$_POST[fechaEntrada]' ,'$_POST[fechaSalida]')";
        $conexion->exec($insercion);

        //echo "Reserva realizada Correctamente";
        //header( "location:reservas.php" );
        $conexion->close();

      ?> 
      <?php
        }else{
          header("location:/administracion/login.php");
        }
      ?>
  </body>
</html>
