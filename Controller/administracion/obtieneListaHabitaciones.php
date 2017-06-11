<?php
session_start();
if ($_SESSION['logueadoAdmin'] == true) {
require_once 'compruebaDB.php';
    require_once '../../Model/Habitacion.php';

    $totalFilas = Habitacion::getTotalHabitaciones();
    $tamano_pagina = 10;
    $pagina = $_REQUEST["pagina"];
    if (!isset($pagina)) {
        $inicio = 0;
        $pagina = 1;
    } else {
        $inicio = ($pagina - 1) * $tamano_pagina;
    }
    //calculo el total de páginas
    $totalPaginas = ceil($totalFilas / $tamano_pagina);
    //$consulta = $conexion->query("SELECT * FROM habitacion ORDER BY codHabitacion ASC LIMIT " . $inicio . "," . $TAMANO_PAGINA);
    $orderBy = "ORDER BY tipo, capacidad, planta, tarifa"; //Orden por defecto
    $orden = $_REQUEST["orden"];
    if (!empty($orden)) {
        $orderBy = "ORDER BY " . $orden;
    }

    $tipoOrden = $_REQUEST["tipoOrden"];
    if (!empty($tipoOrden)) {
        $orderBy .= " " . $tipoOrden;
    } else {
        $orderBy .= " ASC"; //Orden por defecto
    }
    
    $data['habitaciones'] = Habitacion::getHabitaciones($orderBy, $inicio, $tamano_pagina);
    
    require_once '../../View/administracion/listaHabitaciones.php';
    }else {
    header("location:../../Controller/administracion/login.php");
}