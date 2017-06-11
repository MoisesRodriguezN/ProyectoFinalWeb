<?php
require_once 'compruebaDB.php';
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
        header("HACER-RutaDeUsuarios");
    } 
  
    require_once '../../Model/Login.php';
  
  $usuario = $_POST['usuario'];
  $clave = $_POST['clave'];
//    $usuario = "moises";
//    $clave = "moises";
  
    $datos = Login::getTotalFilas($usuario, $clave);
  
    if($datos[filas] == 1 && $datos[rol] == "administrador"){
        $_SESSION['logueadoAdmin'] = true;
        $_SESSION['nombreAdmin'] = $usuario;
        header("location:index.php");
    }
    
    if($datos[rol] == "usuario"){
        $_SESSION['logueadoUser'] = true;
        $_SESSION['nombreUser'] = $usuario;
        $_SESSION['codCliente'] = $datos[codCliente];
        header("HACER-RutaDeUsuarios");
    }
    
    if(($datos[filas] == 0) && isset ($_POST['usuario']) && isset ($_POST['clave'])){
        $error = "<h1 id='error'>Usuario o Clave incorrectos</h1>";
    }
    
    require_once '../../View/administracion/loginHotel.php';
