<?php
  session_start(); // Inicio de sesión
  $_SESSION['reservar2'] = 0;
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Reserva de habitacion - Usuario </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
   
     
    </style>
  </head>
  <body class="fondoCuerpo">
      <?php
        if ( $_SESSION['logueadoUser'] == true){
          try {
            $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
          } catch (PDOException $e) {
              echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
              die ("Error: " . $e->getMessage());
          }
          
          $fechaEntrada = $_POST['fechaEntrada'];
          $fechaSalida = $_POST['fechaSalida'];

          $fechaEntradaEsp = "STR_TO_DATE('$fechaEntrada', '%d-%m-%Y')";
          $fechaSalidaEsp = "STR_TO_DATE('$fechaSalida', '%d-%m-%Y')";
          
          $insercion = "INSERT INTO RESERVA (codCliente, codHabitacion,	fechaEntrada,	fechaSalida) VALUES ('$_POST[codCliente]',"
              . "'$_POST[codHabitacion]',$fechaEntradaEsp ,$fechaSalidaEsp)";
          $conexion->exec($insercion);
          header( "location:/usuario/index.php" );
          $conexion->close();
        }else{
          header("location:/usuario/login.php");
        }
      ?>
  </body>
</html>
