<?php
  session_start(); // Inicio de sesión
  if(!isset($_SESSION['logueadoAdmin'])) {
    $_SESSION['logueadoAdmin'] = false;
    $_SESSION['nombreAdmin'] = "";
  } //Sesión Administradores
  
  if(!isset($_SESSION['logueadoUser'])) {
    $_SESSION['logueadoUser'] = false;
  } //Sesión Usuarios
  
  if($_SESSION['logueadoAdmin']==TRUE) {
    header("location:index.php");
  } //Sesión Administradores
  
  if($_SESSION['logueadoUser'] == TRUE) {
    header("location:../usuario/index.php");
  } 
  
   $codHabitacion= $_GET['codHabitacion'];     
  $fechaEntrada = $_GET['fechaEntrada'];
  $fechaSalida = $_GET['fechaSalida']; 
  
  if(isset($codHabitacion)){
    echo "existe";
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="../css/Cuerpo.css">
    <link rel="stylesheet" type="text/css" href="../css/Cabecera.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        $consulta = $conexion->query("SELECT * FROM login WHERE usuario='$usuario' and clave='$clave'");
        $error = "";

        if($consulta->rowCount() == 1){
          $datos = $consulta->fetchObject();
          if($datos->rol == "administrador"){
            $_SESSION['logueadoAdmin'] = true;
            $_SESSION['nombreAdmin'] = $usuario;
            header("location:index.php");
          }

          if($datos->rol == "usuario"){
            $_SESSION['logueadoUser'] = true;
            $_SESSION['nombreUser'] = $usuario;
            $_SESSION['codCliente'] = $datos->codCliente;
            header("location:../usuario/index.php");
          }

        }else if(($consulta->rowCount() == 0) && isset ($_POST['usuario']) && isset ($_POST['clave'])){
          $error = "<h1 id='error'>Usuario o Clave incorrectos</h1>";
        }

      ?>
      <div class="logo"><img class="logo" src="../img/logoLogin.png"></div>
    <div class="login-block">
        <h1>Login</h1>
        <?=$error?>
        <form action="login.php" method="post">
          <input type="text" name="usuario" required placeholder="Usuario" id="usuario" autofocus=""/>
          <input type="password" name="clave" required placeholder="Contraseña" id="clave" />
          <button type="submit">Entrar</button>
        </form>
    </div>
  </body>
</html>