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
    
    public static function setNombreDelHotel($nombreHotel){
        $conexion = HotelDB::connectDB();
        $seleccion = "UPDATE texto SET nombreHotel='" . $nombreHotel;
        $conexion->exec($seleccion);

    }
    
    public static function setImagenHotel($idImagen, $ruta){
        $conexion = HotelDB::connectDB();
        $seleccion = "UPDATE imagen SET ruta='" .$ruta . "' WHERE codImagen='" . $idImagen . "'";
        $conexion->exec($seleccion);
    }
    
    
    public static function getImagenHotel($idImagen){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT ruta FROM imagen WHERE codImagen='" . $idImagen ."'";
        $consulta = $conexion->query($seleccion);
        
        $rutaImg= $consulta->fetchObject();
        return $rutaImg;
    }       
}
