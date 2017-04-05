<?php
session_start();
if ( $_SESSION['logueadoUser'] == true){
      try {
          $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
      } catch (PDOException $e) {
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
          die ("Error: " . $e->getMessage());
      }
      
      $sql = "SELECT codCliente FROM cliente WHERE DNI=\"$_POST[dni2]\"";
      $consulta = $conexion->query($sql);
      $resultado = $consulta->fetchObject();
      $codCliente = $resultado->codCliente;

      $modificacion = "UPDATE cliente SET DNI=\"$_POST[DNI]\", "
            . "nombre=\"$_POST[nombre]\", apellido1=\"$_POST[apellido1]\", "
            . "apellido2=\"$_POST[apellido2]\""
            . " WHERE codCliente=" . $codCliente;
      
      $conexion->exec($modificacion);
      
     include "./datosMiCuenta.php";
}else{
  //script para devolver al login
}