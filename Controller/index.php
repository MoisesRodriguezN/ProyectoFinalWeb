<?php
  session_start();

  require_once '../Controller/compruebaDB.php';
  
  require_once '../Model/datosHotel.php';
  
      
    $idImagen = array("img1Galeria", "img2Galeria", "img3Galeria", "img4Galeria"
        , "img5Galeria");
    
    
    
    $idImgLogo = "logoHotel";
    
    $imagenesGaleria = array(
        'img1' => datosHotel::getNombreImagen($idImagen[0]),
        'img2' => datosHotel::getNombreImagen($idImagen[1]),
        'img3' => datosHotel::getNombreImagen($idImagen[2]),
        'img4' => datosHotel::getNombreImagen($idImagen[3]),
        'img5' => datosHotel::getNombreImagen($idImagen[4]), 
    );
    
    $idImagen2 = array("facebook", "googlePlus", "instagram", "twitter");
    
    $urlSociales = array(
        'facebook' => datosHotel::getUrlSocial($idImagen2[0]),
        'googlePlus' => datosHotel::getUrlSocial($idImagen2[1]),
        'instagram' => datosHotel::getUrlSocial($idImagen2[2]),
        'twitter' => datosHotel::getUrlSocial($idImagen2[3]),  
    );
    
    $logo = datosHotel::getNombreImagen($idImgLogo);
    $nombreHotel = datosHotel::getNombreDelHotel(); 

    $idImagenSocial = array("facebook", "googlePlus", "instagram", "twitter");

    $estadoImg = array(
        'facebook' => datosHotel::getEstadoImagen($idImagenSocial[0]),
        'googlePlus' => datosHotel::getEstadoImagen($idImagenSocial[1]),
        'instagram' => datosHotel::getEstadoImagen($idImagenSocial[2]),
        'twitter' => datosHotel::getEstadoImagen($idImagenSocial[3]), 
    );
  require_once '../View/index.php';