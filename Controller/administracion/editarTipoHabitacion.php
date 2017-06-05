<?php

session_start();
include_once '../../Model/HotelDB.php';
$conexion = HotelDB::connectDB();

if (isset($_POST['idTextoEdit'])) { //Obtiene el identificador del texto
    $textoMod = $_POST['idTextoEdit'];   //Lo obtiene al pulsar el texto
} else {
    $textoMod = $_POST['idTextoEditar']; //Lo obtiene al pulsar el botón guardar
}

if ($textoMod == "pag2Texto1") {
    $seleccion = "SELECT habIndividual FROM texto";
    $parrafo = "habIndividual";
}

if ($textoMod == "pag2Texto2") {
    $seleccion = "SELECT habDoble FROM texto";
    $parrafo = "habDoble";
}

if (isset($_POST['descripHab'])) {
    $descripHab = $_POST['descripHab'];
    $modificacion = "UPDATE texto SET " . $parrafo . "=?";
    var_dump($modificacion);
    try {
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conexion->prepare($modificacion);

        $stmt->execute(array($descripHab));
    } catch (PDOException $e) {
        echo $modificacion . "<br>" . $e->getMessage();
    }
}

$consulta = $conexion->query($seleccion);
$texto = $consulta->fetchObject();

if (isset($_POST['descripHab'])) {
    include_once '../../Controller/usuario/tiposHabitaciones.php';
} else {
    include_once '../../View/administracion/editarView.php';
}

