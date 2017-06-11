<?php
require_once 'compruebaDB.php';
session_start();
if ($_SESSION['logueadoUser'] == true) {
    $usuario = $_SESSION[nombreUser];

    $mensaje = "<div class='mensaje1'>
                  <span>Clave Actualizada. Vuelva a iniciar sesión.</span>
                  </div>";
    
    require_once '../../Model/datosHotel.php';
  
    $nombreHotel = datosHotel::getNombreDelHotel(); 
    $idImgLogo = "logoHotel";
    $logo = datosHotel::getNombreImagen($idImgLogo);
    $idImagenSocial = array("facebook", "googlePlus", "instagram", "twitter");

    $estadoImg = array(
        'facebook' => datosHotel::getEstadoImagen($idImagenSocial[0]),
        'googlePlus' => datosHotel::getEstadoImagen($idImagenSocial[1]),
        'instagram' => datosHotel::getEstadoImagen($idImagenSocial[2]),
        'twitter' => datosHotel::getEstadoImagen($idImagenSocial[3]), 
    );
    $idImagen2 = array("facebook", "googlePlus", "instagram", "twitter");
    
    $urlSociales = array(
        'facebook' => datosHotel::getUrlSocial($idImagen2[0]),
        'googlePlus' => datosHotel::getUrlSocial($idImagen2[1]),
        'instagram' => datosHotel::getUrlSocial($idImagen2[2]),
        'twitter' => datosHotel::getUrlSocial($idImagen2[3]),  
    );
    
    include_once '../../View/usuario/miCuentaView.php';
}else{
    header("location:../../Controller/usuario/login.php");
}