<?php
session_start();

if ($_SESSION['logueadoAdmin'] == true) {
require_once 'compruebaDB.php';
  require_once '../../View/administracion/inicioClientes.php';
  }else {
    header("location:../../Controller/administracion/login.php");
}