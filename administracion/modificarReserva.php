<?php
<<<<<<< HEAD
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Modificación de reservas</title>
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
        
        $consulta = $conexion->query("SELECT * FROM reserva r "
        . "JOIN habitacion h ON (r.codHabitacion = h.codHabitacion) "
        . "JOIN cliente c ON (c.codCliente = r.codCliente)"
        . "WHERE r.codHabitacion=\"$_POST[codHabitacion]\" AND r.codCliente=\"$_POST[codCliente]\" "
        . "AND r.fechaEntrada=\"$_POST[fechaEntrada]\"");
        $reserva = $consulta->fetchObject();
        $accion = $_POST['accion'];
        
        if ($accion == "actualizar"){
          $modificacion = "UPDATE reserva SET  fechaEntrada=\"$_POST[fechaEntrada]\", "
            . "fechaSalida=\"$_POST[fechaSalida]\" WHERE codHabitacion=\"$_POST[codHabitacion]\" "
            . "AND codCliente=\"$_POST[codCliente]\" AND fechaEntrada=\"$_POST[fechaEntradaHidden]\"";
          $conexion->exec($modificacion);
          header( "location:reservas.php" );
          $conexion->close();
        }else{
      ?>
        <div class="contenedorForm">
          <div class="panel panel-primary">
              <div class="panel-heading cabeceraDivForm">Modificación de clientes</div>
              <div class="cuadroForm">
                  <form action="modificarReserva.php" class="formCentrado" method="post">
                      
                  <div class="form-group">
                    <label for="inputCodHabitacion">codHabitacion:</label>
                    <input type="text" name="codHabitacion" id="inputCodHabitacion" class="form-control" value="<?= $reserva->codHabitacion ?>" readonly="readonly">
                  </div>
                      
                  <div class="form-group">
                    <label for="inputCodCliente">codCliente:</label>
                    <input type="hidden" name="accion" value="actualizar">
                    <input type="text" name="codCliente" id="inputCodCliente" class="form-control" value="<?= $reserva->codCliente ?>" readonly="readonly">
                  </div>
 
                  <div class="form-group">
                    <label for="inputDni">DNI:</label>
                    <input type="text" name="DNI" id="inputDni" class="form-control" value="<?= $reserva->DNI ?>" readonly="readonly">
                  </div>
=======
>>>>>>> 6f70f332edfc99d4261ab5fcb77a56f8a678505c

session_start(); // Inicio de sesión

if ($_SESSION['logueadoAdmin'] == true) {
  try {
    $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
  } catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
  }

  $modificacion = "UPDATE reserva SET  fechaEntrada=\"$_POST[fechaEntrada]\", "
    . "fechaSalida=\"$_POST[fechaSalida]\" WHERE codHabitacion=\"$_POST[codHabitacion]\" "
    . "AND codCliente=\"$_POST[codCliente]\" AND fechaEntrada=\"$_POST[fechaEntradaHidden]\"";

  $conexion->exec($modificacion);
  include "./listaReservas.php";
}
