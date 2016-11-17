<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Modificacioń de clientes</title>
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
        
        $consulta = $conexion->query("SELECT * FROM cliente JOIN habitacion ON "
        . "cliente.codHabitacion=habitacion.codHabitacion WHERE codCliente=\"$_POST[codCliente]\" ");
        $cliente = $consulta->fetchObject();
        $accion = $_POST['accion'];
        
        if ($accion == "actualizar"){
          $modificacion = "UPDATE cliente SET  DNI=\"$_POST[DNI]\", "
            . "nombre=\"$_POST[nombre]\", apellido1=\"$_POST[apellido1]\", "
            . "apellido2=\"$_POST[apellido2]\", fechaInicial=\"$_POST[fechaInicial]\", fechaFinal=\"$_POST[fechaFinal]\", tarifa=\"$_POST[tarifa]\", codHabitacion=\"$_POST[codHabitacion]\""
            . " WHERE codCliente=\"$_POST[codCliente]\"";
          $conexion->exec($modificacion);
          echo "Cliente actualizado correctamente.";
          header( "refresh:3;url=indexAdmin.php" );
          $conexion->close();
        }else{
      ?>
          <form action="modificarCliente.php" method="post">
            <input type="hidden" name="accion" value="actualizar">
            CodCliente: <input type="text" name="codCliente" value="<?= $cliente->codCliente ?>" readonly="readonly"><br>
            DNI: <input type="text" name="DNI" value="<?= $cliente->DNI ?>"><br>
            nombre: <input type="text" name="nombre" value="<?= $cliente->nombre ?>"><br>
            apellido1: <input type="text" name="apellido1" value="<?= $cliente->apellido1 ?>"><br>
            apellido2: <input type="text" name="apellido2" value="<?= $cliente->apellido2 ?>"><br>
            fechaInicio: <input type="date" name="fechaInicial" value="<?= $cliente->fechaInicial ?>"><br>
            fechaFinal: <input type="date" name="fechaFinal" value="<?= $cliente->fechaFinal ?>"><br>
            tarifa: <input type="text" name="tarifa" value="<?= $cliente->tarifa ?>"><br>
            codHabitacion: <input type="text" name="codHabitacion" value="<?= $cliente->codHabitacion?>"><br>
            <input type="submit" value="Modificar">
          </form>
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
