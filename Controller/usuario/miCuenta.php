<?php

session_start();
if ($_SESSION['logueadoUser'] == true) {
    $usuario = $_SESSION[nombreUser];

    $mensaje = "<div class='mensaje1'>
                  <span>Clave Actualizada. Vuelva a iniciar sesión.</span>
                  </div>";
    
    require_once '../../Model/datosHotel.php';
  
    $nombreHotel = datosHotel::getNombreDelHotel(); 
    
    include_once '../../View/usuario/miCuentaView.php';
}else{
    header("location:../../Controller/usuario/login.php");
}