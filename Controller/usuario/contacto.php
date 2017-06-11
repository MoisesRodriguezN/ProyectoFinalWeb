<?php
require_once 'compruebaDB.php';
if ($_POST[accion] == enviar) {
    $para = "moises_rodiguez@hotmail.com";
    $titulo = 'Contacto Hotel';
    $mensaje = "Nombre: " . $_POST[nombre] . "apellido1: " . $_POST[apellido1] .
            "apellido2: " . $_POST[apellido2] . $_POST[comentario];
    $cabeceras = 'From: ' . $_POST[email] . "\r\n" .
            'Reply-To: ' . $_POST[email] . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    $bol = mail($para, $titulo, $mensaje, $cabeceras);

    if ($bol) {
        $estado = "enviado";
    } else {
        $estado = "No enviado";
    }
}

require_once '../../Model/datosHotel.php';
    
    $idImgLogo = "logoHotel";
 
    $logo = datosHotel::getNombreImagen($idImgLogo);
  
$nombreHotel = datosHotel::getNombreDelHotel(); 

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
require_once '../../View/usuario/contactoView.php';

