<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $codHabitacion= $_GET['codHabitacion'];     
        $fechaEntrada = $_GET['fechaEntrada'];
        $fechaSalida = $_GET['fechaSalida'];
        
        if(isset($_SESSION['logueadoUser'])) {
          ?>
           <form name="confirmarReserva" action="reservaConfirmada.php" method="POST">
              <input type="hidden"  name="codHabitacion" value="<?= $codHabitacion ?>">
              <input type="date"  name="fechaEntrada" value="<?= $fechaEntrada?>" disabled>
              <input type="date"  name="fechaSalida" value="<?= $fechaSalida ?>" disabled>
              <input type="submit" value="Confirmar" />
           </form>
        <?php
        } else{
          header("location:login.php?codHabitacion=$codHabitacion&fechaEntrada=$fechaEntrada&fechaSalida=$fechaSalida");
        }
        ?>
    </body>
</html>
