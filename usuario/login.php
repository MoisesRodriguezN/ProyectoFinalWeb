<?php
  session_start(); // Inicio de sesión

  if(!isset($_SESSION['logueadoUser'])) {
    $_SESSION['logueadoUser'] = false;
  } 
  
  if($_SESSION['logueadoUser'] == true && $_SESSION['reservar2'] != 1) {
    header("location:index.php");
  } 
  
  if(!isset($_SESSION['reservar2'])) {
    $_SESSION['reservar2'] = $_GET['reserva'];
  } 
  
  $codHabitacion= $_GET['codHabitacion'];     
  $fechaEntrada = $_GET['fechaEntrada'];
  $fechaSalida = $_GET['fechaSalida']; 
  $reservar = false;
  
  if(empty($codHabitacion && $fechaEntrada && $fechaSalida) && $_SESSION['reservar2'] == 1){
    $reservar = true;
    $codHabitacion= $_POST['codHabitacion'];     
    $fechaEntrada = $_POST['fechaEntrada'];
    $fechaSalida = $_POST['fechaSalida']; 
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
   
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

            if($reservar == 2){
              header("location:confirmarReserva.php?codHabitacion=$codHabitacion&fechaEntrada=$fechaEntrada&fechaSalida=$fechaSalida");
            }else{
              header("location:index.php");
            }
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
          <input type="text" name="usuario" required placeholder="Username" id="username" autofocus="" />
          <input type="password" name="clave" required placeholder="Password" id="password" />
          <input type="hidden" name="codHabitacion"  value="<?=$codHabitacion?>"/>
          <input type="hidden" name="fechaEntrada" value="<?=$fechaEntrada?>" />
          <input type="hidden" name="fechaSalida" value="<?=$fechaSalida?>" />
          <button type="submit">Entrar</button>
        </form>
        <br>
        <a href="registro.php"><button type="submit">Registrarse</button></a>
        <br>
        <br>
        <a href="../index.php"><button type="submit">Volver al inicio</button></a>
    </div>
  </body>
</html>