<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Modificación de clientes</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/Cuerpo.css">
    <link rel="stylesheet" type="text/css" href="../css/Cabecera.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      
    </style>
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
        
        $consulta = $conexion->query("SELECT * FROM cliente WHERE codCliente=\"$_POST[codCliente]\" ");
        $cliente = $consulta->fetchObject();
        $accion = $_POST['accion'];
        
        if ($accion == "actualizar"){
          $modificacion = "UPDATE cliente SET  DNI=\"$_POST[DNI]\", "
            . "nombre=\"$_POST[nombre]\", apellido1=\"$_POST[apellido1]\", "
            . "apellido2=\"$_POST[apellido2]\""
            . " WHERE codCliente=\"$_POST[codCliente]\"";
          $conexion->exec($modificacion);
          header( "location:index.php" );
          $conexion->close();
        }else{
      ?>
        <div class="contenedorForm">
          <div class="panel panel-primary">
              <div class="panel-heading cabeceraDivForm">Modificación de clientes</div>
              <div class="cuadroForm">
                <form action="modificarCliente.php" class="formCentrado" method="post">
                  <div class="form-group">
                    <label for="inputCodCliente">CodCliente:</label>
                    <input type="hidden" name="accion" value="actualizar">
                    <input type="text" name="codCliente" id="inputCodCliente" class="form-control" value="<?= $cliente->codCliente ?>" readonly="readonly">
                  </div>

                  <div class="form-group">
                    <label for="inputDni">DNI:</label>
                    <input type="text" name="DNI" id="inputDni" class="form-control" value="<?= $cliente->DNI ?>">
                  </div>

                  <div class="form-group">
                    <label for="inputNobre">Nombre:</label>
                    <input type="text" name="nombre" id="inputNombre" class="form-control" value="<?= $cliente->nombre ?>">
                  </div>

                  <div class="form-group">
                    <label for="inputApellido">Apellido1:</label>
                    <input type="text" name="apellido1" id="inputApellido" class="form-control" value="<?= $cliente->apellido1 ?>">
                  </div>

                  <div class="form-group">
                    <label for="inputApellido2">Apellido2:</label>
                    <input type="text" name="apellido2" id="inputApellido2" class="form-control" value="<?= $cliente->apellido2 ?>">
                  </div>
                  <button type="submit" class="btn btn-default">Enviar</button>
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
