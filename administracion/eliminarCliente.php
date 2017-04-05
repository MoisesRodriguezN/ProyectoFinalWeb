<?php
  session_start(); // Inicio de sesión
?>
  <?php
    if ( $_SESSION['logueadoAdmin'] == true){
      try {
        $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
      } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
      }
      $borrar = "DELETE FROM cliente WHERE codCliente=".$_POST['codCliente'];
      $conexion->exec($borrar);
    }