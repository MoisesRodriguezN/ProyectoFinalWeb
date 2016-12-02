<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Eliminar habitación</title>
        <link rel="stylesheet" type="text/css" href="../css/Cuerpo.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          header( "location:adminHabitaciones.php" );
          $conexion->close();  
        }else{
          ?> 
          <div class="contenedorConfirmar">
          <div class="cabeceraConfirmar">
              <span>BORRAR</span>
          </div>
          <div class="cuerpoConfirmar">
            <span>¿Estás seguro que deseas borrar la habitación?</span>
          </div>
          <div class="botonesConfirmar">
              <form action="eliminarHabitacion.php" method="post">
              <input type="hidden" name="accion" value="eliminar">
              <input type="hidden" name="codHabitacion" value="<?=$_POST['codHabitacion']?>">
              <input type="submit" class="btnEnvio2NoMargin btnEnvio3NoMargin" value="Eliminar">
            </form>
              
            <a href="adminHabitaciones.php"><button type="button" class="btnEnvio2NoMargin btnEnvio3NoMargin">Volver</button></a>
          </div>
        </div>
        <?php
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