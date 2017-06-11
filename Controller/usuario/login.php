<?php
require_once 'compruebaDB.php';
/* Login de usuarios */

session_start(); // Inicio de sesión

$reservaHab = 0;
$codHabitacion = $_GET['codHabitacion'];
$fechaEntrada = $_GET['fechaEntrada'];
$fechaSalida = $_GET['fechaSalida'];

//Usuario no logueado sin reserva
if (!isset($_SESSION['logueadoUser'])) {
    $_SESSION['logueadoUser'] = false;
}

//Usuario loguqeado sin reservar. Redirecciona a la página de inicio de usuario.
    if ($_SESSION['logueadoUser'] && $_SESSION['reservar'] == FALSE) {
    header("location:index.php");
}

//Usuario loguqeado con reserva. Redirecciona a la página de inicio de usuario.
    if ($_SESSION['logueadoUser'] && $_SESSION['reservar'] == TRUE) {
     header("location:confirmarReserva.php?codHabitacion=$codHabitacion&fechaEntrada=$fechaEntrada&fechaSalida=$fechaSalida");
}


//Usuario sin loguear y llegan datos de reseva de una habitación
if ($_SESSION['logueadoUser'] == FALSE && $_SESSION['reservar'] == TRUE 
        && !empty($codHabitacion) && !empty($fechaEntrada) && !empty($fechaSalida)) {

    $_SESSION['reservar'] = FALSE;
    
    $reservaHab = 1;
    
}



require_once '../../Model/Login.php';

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$datos = Login::getTotalFilas($usuario, $clave);

if ($datos[filas] == 1) {
    if ($datos[rol] == "usuario") {
        $_SESSION['logueadoUser'] = true;
        $_SESSION['nombreUser'] = $usuario;
        $_SESSION['codCliente'] = $datos[CodCliente];
        $reservaHab = $_POST['estadoReserva'];

        if (!empty($reservaHab) && $reservaHab == 1) {
            $codHabitacion = $_POST['codHabitacion'];
            $fechaEntrada = $_POST['fechaEntrada'];
            $fechaSalida = $_POST['fechaSalida'];
            header("location:confirmarReserva.php?codHabitacion=$codHabitacion&fechaEntrada=$fechaEntrada&fechaSalida=$fechaSalida");
        } else {
            header("location:index.php");
        }
    }
} else if (($datos[filas] == 0) && isset($_POST['usuario']) && isset($_POST['clave'])) {
    $error = "<h1 id='error'>Usuario o Clave incorrectos</h1>";
    
    //Se vuelve a obtener los datos de la reserva.
    $codHabitacion = $_POST['codHabitacion'];
    $fechaEntrada = $_POST['fechaEntrada'];
    $fechaSalida = $_POST['fechaSalida'];
    $reservaHab = $_POST['estadoReserva'];
}

    require_once '../../Model/datosHotel.php';
    
    $idImgLogo = "imgCabeceraGenForm";
 
    $logo = datosHotel::getNombreImagen($idImgLogo);
include_once '../../View/usuario/loginView.php';
