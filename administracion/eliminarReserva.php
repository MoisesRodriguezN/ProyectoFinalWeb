<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Eliminar reserva</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
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
          $fecha = "fechaEntrada= '$_POST[fechaEntrada]'";
          $borrar = "DELETE FROM reserva WHERE codHabitacion=".$_POST['codHabitacion']
          . " AND codCliente=".$_POST['codCliente'] . " AND " . $fecha;
          $conexion->exec($borrar);
          echo "Reserva eliminada correctamente.";
          header( "location:reservas.php" );
          $conexion->close();  
        }else{
          ?> 
          <div class="contenedorConfirmar">
            <div class="cabeceraConfirmar">
                <span>BORRAR</span>
            </div>
            <div class="cuerpoConfirmar">
              <span>¿Estás seguro que deseas borrar la reserva?</span>
            </div>
            <div class="botonesConfirmar">
                <form action="eliminarReserva.php" method="post">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="codHabitacion" value="<?=$_POST['codHabitacion']?>">
                <input type="hidden" name="codCliente" value="<?=$_POST['codCliente']?>">
                <input type="hidden" name="fechaEntrada" value="<?=$_POST['fechaEntrada']?>">
                <input type="submit" class="btnEnvio2NoMargin btnEnvio3NoMargin" value="Eliminar">
              </form>

              <a href="reservas.php"><button type="button" class="btnEnvio2NoMargin btnEnvio3NoMargin">Volver</button></a>
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