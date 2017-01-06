<?php

session_start();
if ($_SESSION['logueadoUser'] == true) {
  try {
    $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
  } catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
  }

  $modificacionClave = "UPDATE login SET clave=\"$_POST[clave]\" "
    . " WHERE usuario=\"$_POST[usuario]\"";
  $conexion->exec($modificacionClave);

  $mensaje = "<div class='mensaje1'>
                  <span>Clave Actualizada. Vuelva a iniciar sesión.</span>
                  </div>";
  session_destroy();
  echo $mensaje;
} else {
  //script para devolver al login
}