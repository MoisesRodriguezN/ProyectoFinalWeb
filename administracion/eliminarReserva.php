<?php

session_start(); // Inicio de sesión

if ($_SESSION['logueadoAdmin'] == true) {
  try {
    $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
  } catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
  }

  $fecha = "fechaEntrada= '$_POST[fechaEntrada]'";
  $borrar = "DELETE FROM reserva WHERE codHabitacion=" . $_POST['codHabitacion']
    . " AND codCliente=" . $_POST['codCliente'] . " AND " . $fecha;
  $conexion->exec($borrar);
}
