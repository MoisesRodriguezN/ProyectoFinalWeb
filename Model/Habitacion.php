<?php

/**
 * Clase para operaciones sobre el listado de habitaciones.
 *
 * @author Moisés
 */

require_once 'HotelDB.php';

class Habitacion {
    private $codHabitacion;
    private $tipo;
    private $capacidad;
    private $planta;
    private $tarifa;
    
    function __construct($codHabitacion, $tipo, $capacidad, $planta, $tarifa) {
        $this->codHabitacion = $codHabitacion;
        $this->tipo = $tipo;
        $this->capacidad = $capacidad;
        $this->planta = $planta;
        $this->tarifa = $tarifa;
    }
    
    function getCodHabitacion() {
        return $this->codHabitacion;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getCapacidad() {
        return $this->capacidad;
    }

    function getPlanta() {
        return $this->planta;
    }

    function getTarifa() {
        return $this->tarifa;
    }

    
    /**
     * Método que devuelve el total de filas de la consulta de Habitaciones.
     * @return Int Cantiad de filas.
     * 
     */
    public static function getTotalHabitaciones(){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM habitacion";
        $consulta = $conexion->query($seleccion);
        $total = $consulta->rowCount();
        
        return $total;
    }
    
    /**
    * Método que devuelve una lista de habitaciones con paginación
    * @param String $orderBy Campo y orden ASC o DESC. EJEMPLO:
     * ORDER BY tipo, capacidad, planta, tarifa ASC
    * @param Int $inicio Número de fila desde el que se empiezan a mostrar resultados
    * @param Int $tamano_pagina Entero con el tamaño de página. Número de resultados
     *  por página
    * @return Array Array de objetos con el listado de habitaciones
    * 
    */
    public static function getHabitaciones($orderBy, $inicio, $tamano_pagina) {
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM habitacion " . $orderBy . " LIMIT " . $inicio . "," . $tamano_pagina;
        $consulta = $conexion->query($seleccion);

        $habitaciones = [];

        while ($registro = $consulta->fetchObject()) {
            $habitaciones[] = new Habitacion($registro->codHabitacion, $registro->tipo, $registro->capacidad, $registro->planta, $registro->tarifa);
        }

        return $habitaciones;
    }

}
