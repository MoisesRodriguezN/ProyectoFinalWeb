<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmar Reserva</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <?php
        
        $codHabitacion = $_GET['codHabitacion'];     
        $fechaEntrada = $_GET['fechaEntrada'];
        $fechaSalida = $_GET['fechaSalida'];
        
        if(isset($_SESSION['logueadoUser'])) {
          try {
          $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
          } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
          }
          
          $usuario = $_SESSION[nombreUser];
          $sql = "SELECT * FROM cliente c, login lo "
             . "WHERE c.codCliente = lo.codCliente AND lo.usuario ='$usuario' ";
          $consulta = $conexion->query($sql);
          $datos = $consulta->fetchObject();
          ?>
        
        <div class="logo"><img class="logo" src="../img/logoLogin.png"></div>
        <div class="login-block">
          <h1>Login</h1>
          <?=$error?>
          <form action="reservaConfirmada.php" name="confirmarReserva" method="POST">
            <input type="hidden"  name="codHabitacion" value="<?= $codHabitacion ?>">
            <input type="hidden"  name="codCliente" value="<?= $codCliente ?>">
            <input type="date"  name="dni" value="<?= $datos->DNI?>" disabled>
            <input type="date"  name="nombre" value="<?= $datos->nombre?>" disabled>
            <input type="date"  name="apellido1" value="<?= $datos->apellido1?>" disabled>
            <input type="date"  name="apellido2" value="<?= $datos->apellido2?>" disabled>
            <input type="date"  name="fechaEntrada" value="<?= $fechaEntrada?>" disabled>
            <input type="date"  name="fechaSalida" value="<?= $fechaSalida ?>" disabled>
            <button type="submit">Confirmar</button>
          </form>
        
        </div>
         
        <?php
        } else{
          header("location:login.php?codHabitacion=$codHabitacion&fechaEntrada=$fechaEntrada&fechaSalida=$fechaSalida&reserva=1");
        }
        ?>
    </body>
</html>
