<?php


/**
 * Clase para datos del hotel
 * 
 */

include_once 'HotelDB.php';

class datosHotel {
    private $nombreHotel;
    
    function __construct($nombreHotel) {
        $this->nombreHotel = $nombreHotel;
    }
    
    function getNombreHotel() {
        return $this->nombreHotel;
    }
    
    public static function getNombreDelHotel(){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT nombreHotel FROM texto" ;
        $consulta = $conexion->query($seleccion);
        
        $clientes = $consulta->fetchObject();
        return $clientes;
    } 
            
}
