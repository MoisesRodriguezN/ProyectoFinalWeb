<?php
  session_start(); // Inicio de sesión
  if(!isset($_SESSION['logueadoAdmin'])) {
    $_SESSION['logueadoAdmin'] = false;
    $_SESSION['nombreAdmin'] = "";
  } //Sesión Administradores
  
  if(!isset($_SESSION['logueadoUser'])) {
    $_SESSION['logueadoUser'] = false;
  } //Sesión Usuarios
?>
<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<meta charset="UTF-8">

<title>Elegant Login - Designscrazed</title>
<style>
  body {
      background: url('http://i.imgur.com/Eor57Ae.jpg') no-repeat fixed center center;
      background-size: cover;
      font-family: Montserrat;
  }

  .logo {
      width: 213px;
      height: 36px;
      background: url('http://i.imgur.com/fd8Lcso.png') no-repeat;
      margin: 30px auto;
  }

  .login-block {
      width: 320px;
      padding: 20px;
      background: #fff;
      border-radius: 5px;
      border-top: 5px solid #ff656c;
      margin: 0 auto;
  }

  .login-block h1 {
      text-align: center;
      color: #000;
      font-size: 18px;
      text-transform: uppercase;
      margin-top: 0;
      margin-bottom: 20px;
  }

  .login-block input {
      width: 100%;
      height: 42px;
      box-sizing: border-box;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-bottom: 20px;
      font-size: 14px;
      font-family: Montserrat;
      padding: 0 20px 0 50px;
      outline: none;
  }

  .login-block input#username {
      background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
      background-size: 16px 80px;
  }

  .login-block input#username:focus {
      background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
      background-size: 16px 80px;
  }

  .login-block input#password {
      background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
      background-size: 16px 80px;
  }

  .login-block input#password:focus {
      background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
      background-size: 16px 80px;
  }

  .login-block input:active, .login-block input:focus {
      border: 1px solid #ff656c;
  }

  .login-block button {
      width: 100%;
      height: 40px;
      background: #ff656c;
      box-sizing: border-box;
      border-radius: 5px;
      border: 1px solid #e15960;
      color: #fff;
      font-weight: bold;
      text-transform: uppercase;
      font-size: 14px;
      font-family: Montserrat;
      outline: none;
      cursor: pointer;
  }

  .login-block button:hover {
      background: #ff7b81;
  }

  #error{
      color: #f8363f;
  }
</style>
</head>

<body>
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
        if($datos -> rol == "administrador"){
          $_SESSION['logueadoAdmin'] = true;
          $_SESSION['nombreAdmin'] = $usuario;
          header("location:indexAdmin.php");
        }
        
        if($datos -> rol == "usuario"){
          $_SESSION['logueadoUser'] = true;
          header("location:indexUsuario.php");
        }
        
      }else if(($consulta->rowCount() == 0) && isset ($_POST['usuario']) && isset ($_POST['clave'])){
        $error = "<h1 id='error'>Usuario o Clave incorrectos</h1>";
      }

    ?>
  <div class="logo"></div>
  <div class="login-block">
      <h1>Login</h1>
      <?=$error?>
      <form action="login.php" method="post">
        <input type="text" name="usuario" required placeholder="Username" id="username" />
        <input type="password" name="clave" required placeholder="Password" id="password" />
        <button type="submit">Submit</button>
      </form>
  </div>
</body>

</html>