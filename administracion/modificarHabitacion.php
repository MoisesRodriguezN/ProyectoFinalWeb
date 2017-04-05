<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Modificación de habitaciones</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/Cuerpo.css">
    <link rel="stylesheet" type="text/css" href="../css/Cabecera.css">
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
        
        $consulta = $conexion->query("SELECT * FROM habitacion WHERE codHabitacion=\"$_POST[codHabitacion]\" ");
        $habitacion = $consulta->fetchObject();
        $accion = $_POST['accion'];
        
        if ($accion == "actualizar"){
          $modificacion = "UPDATE habitacion SET  tipo=\"$_POST[tipo]\", "
            . "capacidad=\"$_POST[capacidad]\", planta=\"$_POST[planta]\", tarifa=\"$_POST[tarifa]\" "        
            . " WHERE codHabitacion=\"$_POST[codHabitacion]\"";
          $conexion->exec($modificacion);
          header( "location:adminHabitaciones.php" );
          $conexion->close();
        }else{
      ?>
      
      <div class="contenedorForm">
        <div class="panel panel-primary">
          <div class="panel-heading cabeceraDivForm">Modificación de habitaciones</div>
          <div class="cuadroForm">
            <form action="modificarHabitacion.php" class="formCentrado" method="post">
              <div class="form-group">
                <label for="inputcodHabitacion">codHabitacion:</label>
                <input type="hidden" name="accion" value="actualizar">
                <input type="text" name="codHabitacion" id="inputcodHabitacion" class="form-control" value="<?= $habitacion->codHabitacion ?>" readonly="readonly">
              </div>

              <div class="form-group">
                <label for="inputTipo">Tipo:</label>
                <input type="text" name="tipo" id="inputTipo" class="form-control" value="<?= $habitacion->tipo ?>">
              </div>

              <div class="form-group">
                <label for="inputCapacidad">Capacidad:</label>
                <input type="text" name="capacidad" id="inputCapacidad" class="form-control" value="<?= $habitacion->capacidad ?>">
              </div>

              <div class="form-group">
                <label for="inputPlanta">Planta:</label>
                <input type="text" name="planta" id="inputPlanta" class="form-control" value="<?= $habitacion->planta ?>">
              </div>
                
              <div class="form-group">
                <label for="inputTarifa">Tarifa:</label>
                <input type="text" name="tarifa" id="inputTarifa" class="form-control" value="<?= $habitacion->tarifa ?>">
              </div>
              <button type="submit" class="btn btn-default">Actualizar</button>
            </form>
          </div>
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
