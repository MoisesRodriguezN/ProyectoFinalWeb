<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cierre de sesión</title>
    </head>
    <body>
        <?php
          session_destroy();
          header("location:login.php");
        ?>
    </body>
</html>
