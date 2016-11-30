<?php
  session_start(); // Inicio de sesión

  if(!isset($_SESSION['logueadoUser'])) {
    $_SESSION['logueadoUser'] = false;
  } //Sesión Usuarios
  
  if($_SESSION['logueadoUser'] == TRUE) {
    header("location:../usuario/index.php");
  }  
  
  if(isset($codHabitacion)){
    echo "existe";
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <style>
     
      
    </style>
  </head>

  <body class="registroLogin">
    <?php
      // Conexión a la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }

        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $consulta = $conexion->query("SELECT * FROM login WHERE usuario='$usuario' and clave='$clave' and rol='usuario'");
        $error = "";

        if($consulta->rowCount() == 1){
          $datos = $consulta->fetchObject();
          if($datos->rol == "usuario"){
            $_SESSION['logueadoUser'] = true;
            $_SESSION['nombreUser'] = $usuario;
            $_SESSION['codCliente'] = $datos->codCliente;
            header("location:index.php");
          }

          }else if(($consulta->rowCount() == 0) && isset ($_POST['usuario']) && isset ($_POST['clave'])){
            $error = "<h1 id='error'>Usuario o Clave incorrectos</h1>";
          }

      ?>
    <div class="logo"><img class="logo" src="../img/logoLogin.png"></div>
    <div class="login-block">
        <h1>Login</h1>
        <?=$error?>
        <form action="registrar.php" method="post">
            <input type="text" name="dni" required placeholder="DNI" maxlength="9" autofocus=""/>
          <input type="text" name="nombre" required placeholder="Nombre"/>
          <input type="text" name="apellido1" required placeholder="Apellido 1"/>
          <input type="text" name="apellido2" required placeholder="Apellido 2"/>
          <input type="text" name="usuario" required placeholder="Usuario"/>
          <input type="password" name="clave" required placeholder="Contraseña"/>
          <button type="submit">Registrarme</button>
        </form>
        <br>
        <a href="login.php"><button type="submit">Volver Atras</button></a>
    </div>
  </body>
</html>