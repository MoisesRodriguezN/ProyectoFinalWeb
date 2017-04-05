<?php
  session_start(); // Inicio de sesión
?>

<?php
  if ( $_SESSION['logueadoAdmin'] == true){
    try {
      $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
    }

    $consulta = $conexion->query("SELECT * FROM habitacion WHERE codHabitacion=\"$_POST[codHabitacion]\" ");
    $habitacion = $consulta->fetchObject();

    $modificacion = "UPDATE habitacion SET  tipo=\"$_POST[tipo]\", "
      . "capacidad=\"$_POST[capacidad]\", planta=\"$_POST[planta]\", tarifa=\"$_POST[tarifa]\" "        
      . " WHERE codHabitacion=\"$_POST[codHabitacion]\"";
    $conexion->exec($modificacion);
    include "./listaHabitaciones.php";

  }else{
    echo "Debes iniciar sesión para poder entrar en esta zona";
    header("location:login.php");
  }
