<?php
  session_start();

  require_once '../Controller/compruebaDB.php';
  
  require_once '../Model/datosHotel.php';
  
  $nombreHotel = datosHotel::getNombreDelHotel(); 
  require_once '../View/index.php';