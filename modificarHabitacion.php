<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Modificacioń de habitaciones</title>
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
        
        $consulta = $conexion->query("SELECT * FROM habitacion WHERE codHabitacion=\"$_POST[codHabitacion]\" ");
        $habitacion = $consulta->fetchObject();
        $accion = $_POST['accion'];
        
        if ($accion == "actualizar"){
          $modificacion = "UPDATE habitacion SET  tipo=\"$_POST[tipo]\", "
            . "capacidad=\"$_POST[capacidad]\", planta=\"$_POST[planta]\" "        
            . " WHERE codHabitacion=\"$_POST[codHabitacion]\"";
          $conexion->exec($modificacion);
          echo "Habitación actualizada correctamente.";
          header( "refresh:3;url=adminHabitaciones.php" );
          $conexion->close();
        }else{
      ?>
      <form action="modificarHabitacion.php" method="post">
            <input type="hidden" name="accion" value="actualizar">
            codHabitacion: <input type="text" name="codHabitacion" value="<?= $habitacion->codHabitacion ?>" readonly="readonly"><br>
            Tipo: <input type="text" name="tipo" value="<?= $habitacion->tipo ?>"><br>
            Capacidad: <input type="text" name="capacidad" value="<?= $habitacion->capacidad ?>"><br>
            Planta: <input type="text" name="planta" value="<?= $habitacion->planta ?>"><br>
            <input type="submit" value="Modificar">
      </form>
      <?php
        }
      ?> 
      <?php
        }else{
         echo "Debes iniciar sesión para poder entrar en esta zona";
         header("Refresh: 3; url=login.php", true, 303);
        }
      ?>
  </body>
</html>
