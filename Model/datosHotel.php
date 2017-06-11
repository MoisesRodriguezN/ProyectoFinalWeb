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
        $seleccion = "UPDATE texto SET nombreHotel='" . $nombreHotel . "'";
        $conexion->exec($seleccion);

    }
    
    public static function setImagenHotel($idImagen, $ruta){
        $conexion = HotelDB::connectDB();
        $seleccion = "UPDATE imagen SET ruta='" .$ruta . "' WHERE codImagen='" . $idImagen . "'";
        $conexion->exec($seleccion);
    }
    
    public static function setNombreImagen($idImagen, $nombre){
        $conexion = HotelDB::connectDB();
        $seleccion = "UPDATE imagen SET nombre='" .$nombre . "' WHERE codImagen='" . $idImagen . "'";
        $conexion->exec($seleccion);
    }
    
    
    public static function getImagenHotel($idImagen){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT ruta FROM imagen WHERE codImagen='" . $idImagen ."'";
        $consulta = $conexion->query($seleccion);
        
        $rutaImg= $consulta->fetchObject();
        return $rutaImg;
    }
    
    public static function getNombreImagen($idImagen){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT nombre FROM imagen WHERE codImagen='" . $idImagen ."'";
        $consulta = $conexion->query($seleccion);
        
        $nombreImg= $consulta->fetchObject();
        return $nombreImg;
    } 
    
    public static function getEstadoImagen($idImagen){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT estado FROM imagen WHERE codImagen='" . $idImagen ."'";
        $consulta = $conexion->query($seleccion);
        
        $estadoImg= $consulta->fetchObject();
        return $estadoImg;
    } 
    
    public static function setEstadoImagen($redSelect, $estado){
        $conexion = HotelDB::connectDB();
        $seleccion = "UPDATE imagen SET estado='". $estado ."' WHERE codImagen ='". $redSelect ."'";
        var_dump($seleccion);
        $conexion->exec($seleccion);
    }
    
    public static function setUrlSocial($idImagen, $url){
        $conexion = HotelDB::connectDB();
        $seleccion = "UPDATE imagen SET ruta='". $url ."' WHERE codImagen ='". $idImagen ."'";
        var_dump($seleccion);
        $conexion->exec($seleccion);
    }
    
    public static function getUrlSocial($idImagen){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT ruta FROM imagen WHERE codImagen='" . $idImagen ."'";
        $consulta = $conexion->query($seleccion);
        $rutas= $consulta->fetchObject();
        return $rutas;
    }
}
