<?php

    require_once '../../Model/Reserva.php';

    $totalFilas = Reserva::getTotalReservas();

    $tamano_pagina = 3;
    $pagina = $_REQUEST["pagina"];

    if (empty($pagina)) {
        $pagina = 1;
    }

    if (!isset($pagina)) {
        $inicio = 0;
        $pagina = 1;
    } else {
        $inicio = ($pagina - 1) * $tamano_pagina;
    }
    //calculo el total de páginas
    $totalPaginas = ceil($totalFilas / $tamano_pagina);
    //Fin cálculos paginación

    $orderBy = "ORDER BY r.fechaEntrada ASC, r.codHabitacion"; //Orden por defecto
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
    
    $data['reservas'] = Reserva::getReservas($orderBy, $inicio, $tamano_pagina);
    
    require_once '../../View/administracion/listaReservas.php';