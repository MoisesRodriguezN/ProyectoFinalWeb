<?php

/* Login de usuarios */

session_start(); // Inicio de sesión

if (!isset($_SESSION['logueadoUser'])) {
    $_SESSION['logueadoUser'] = false;
}

if ($_SESSION['logueadoUser'] == true && $_SESSION['reservar2'] != 1) {
    header("location:index.php");
}

if (!isset($_SESSION['reservar2'])) {
    $_SESSION['reservar2'] = $_GET['reserva'];
}

$codHabitacion = $_GET['codHabitacion'];
$fechaEntrada = $_GET['fechaEntrada'];
$fechaSalida = $_GET['fechaSalida'];
$reservar = false;

if (empty($codHabitacion && $fechaEntrada && $fechaSalida) && $_SESSION['reservar2'] == 1) {
    $reservar = true;
    $codHabitacion = $_POST['codHabitacion'];
    $fechaEntrada = $_POST['fechaEntrada'];
    $fechaSalida = $_POST['fechaSalida'];
}

require_once '../../Model/Login.php';

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$datos = Login::getTotalFilas($usuario, $clave);

if($datos[filas] == 1){
    if($datos[rol] == "usuario"){
      $_SESSION['logueadoUser'] = true;
      $_SESSION['nombreUser'] = $usuario;
      $_SESSION['codCliente'] = $datos[CodCliente];

      if($reservar == 2){
        header("location:confirmarReserva.php?codHabitacion=$codHabitacion&fechaEntrada=$fechaEntrada&fechaSalida=$fechaSalida");
      }else{
        header("location:index.php");
      }
    }

    }else if(($datos[filas] == 0) && isset ($_POST['usuario']) && isset ($_POST['clave'])){
      $error = "<h1 id='error'>Usuario o Clave incorrectos</h1>";
    }
    
    include_once '../../View/usuario/loginView.php';