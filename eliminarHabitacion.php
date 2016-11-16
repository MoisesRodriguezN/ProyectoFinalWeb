<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar habitación</title>
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
        ?>
        <?php
          $accion = $_POST['accion'];
        if ($accion == "eliminar"){
          $borrar = "DELETE FROM habitacion WHERE codHabitacion=".$_POST['codHabitacion'];
          $conexion->exec($borrar);
          echo "Habitacion borrada correctamente.";
          header( "refresh:3;url=adminHabitaciones.php" );
          $conexion->close();  
        }else{
          ?> 
          ¿Estás seguro que deseas borrar la habitación?
          <form action="eliminarHabitacion.php" method="post">
            <input type="hidden" name="accion" value="eliminar">
            <input type="hidden" name="codHabitacion" value="<?=$_POST['codHabitacion']?>">
            <input type="submit" value="Eliminar">
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