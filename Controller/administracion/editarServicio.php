<?php
session_start();
include_once '../../Model/HotelDB.php';
$conexion = HotelDB::connectDB();

if(isset($_POST['idTextoEdit'])){ //Obtiene el identificador del texto
  $textoMod = $_POST['idTextoEdit'];   //Lo obtiene al pulsar el texto
}else{
  $textoMod = $_POST['idTextoEditar']; //Lo obtiene al pulsar el botón guardar
}

if($textoMod == "pag2Texto1"){
  $seleccion = "SELECT servicios FROM texto";  
  $parrafo = "servicios";
}

if($textoMod == "pag2Texto2"){
  $seleccion = "SELECT comedor FROM texto";
  $parrafo = "comedor";
}

if (isset($_POST['servicios'])) {
    $servicios = $_POST['servicios'];

    $modificacion = "UPDATE texto SET ". $parrafo ."=?";
    try {
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conexion->prepare($modificacion);

        $stmt->execute(array($servicios));

    } catch (PDOException $e) {
        echo $modificacion . "<br>" . $e->getMessage();
    }

}

$consulta = $conexion->query($seleccion);
$texto = $consulta->fetchObject();

if(isset($_POST['servicios'])){
    include_once '../../Controller/usuario/servicios.php';
}else{
    include_once '../../View/administracion/editarView.php';
}

