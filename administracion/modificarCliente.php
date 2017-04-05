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
       
          $modificacion = "UPDATE cliente SET  DNI=\"$_POST[dni]\", "
            . "nombre=\"$_POST[nombre]\", apellido1=\"$_POST[apellido]\", "
            . "apellido2=\"$_POST[apellido2]\""
            . " WHERE codCliente=\"$_POST[codCliente]\"";
          $conexion->exec($modificacion);
          include "./listaClientes.php";
        }else{
         echo "Debes iniciar sesión para poder entrar en esta zona";
         header("location:login.php");
        }
      ?>
  </body>
</html>
