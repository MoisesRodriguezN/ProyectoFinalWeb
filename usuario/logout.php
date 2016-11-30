<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Cierre de sesión</title>
    </head>
    <body>
        <?php
          session_destroy();
          header("location:../index.php");
        ?>
    </body>
</html>
