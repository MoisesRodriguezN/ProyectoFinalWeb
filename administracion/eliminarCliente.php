<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Eliminar cliente</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
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
          $borrar = "DELETE FROM cliente WHERE codCliente=".$_POST['codCliente'];
          $conexion->exec($borrar);
          echo $borrar;
          echo "Cliente borrado correctamente.";
          header("location:index.php");
          $conexion->close();  
        }else{
          ?> 
        <div class="contenedorConfirmar">
          <div class="cabeceraConfirmar">
              <span>BORRAR</span>
          </div>
          <div class="cuerpoConfirmar">
            <span>¿Estás seguro que deseas borrar el cliente?</span>
          </div>
          <div class="botonesConfirmar">
            <form action="eliminarCliente.php" method="post">
              <input type="hidden" name="accion" value="eliminar">
              <input type="hidden" name="codCliente" value="<?=$_POST['codCliente']?>">
              <input type="submit" class="btnEnvio2NoMargin btnEnvio3NoMargin" value="Eliminar">
            </form>
              
            <a href="index.php"><button type="button" class="btnEnvio2NoMargin btnEnvio3NoMargin">Volver</button></a>
          </div>
        </div>
         
        <?php
        }
        ?>
        <?php
         }else{
          header("location:login.php");
         }
        ?>
    </body>
</html>
