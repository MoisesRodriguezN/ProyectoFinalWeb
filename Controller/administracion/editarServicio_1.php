<?php
require_once 'compruebaDB.php';
    session_start();
    include_once '../../Model/HotelDB.php';
    $conexion = HotelDB::connectDB();
    
    if(isset($_POST['servicios']) && isset($_POST['comedor'])){
        echo "ha entrado";
        $servicios = $_POST['servicios'];
        $comedor = $_POST['comedor'];
        $modificacion = "UPDATE texto SET servicios='?', comedor='?'";
        //echo $modificacion;
        try {
            // set the PDO error mode to exception
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Prepare statement
            $stmt = $conexion->prepare($modificacion);

            // execute the query
            $stmt->execute(array($servicios, $comedor));
            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " records UPDATED successfully";
        }
        catch(PDOException $e)
        {
        echo $modificacion . "<br>" . $e->getMessage();
        }
    /*
        if ($conexion->query($modificacion)) {
            echo "ok";
        } else {
            echo "error: " . $conexion->error;
        }
     */
    }
    
    $seleccion = "SELECT servicios, comedor FROM texto";
    $consulta = $conexion->query($seleccion);
    $texto = $consulta->fetchObject();
    

    
?>

<form action="editarServicio.php" method="POST">
  Servicios:<br>
   <textarea name="servicios" rows="10" cols="30"><?=$texto->servicios?></textarea> 
  <br>
  Comedor:<br>
  <textarea name="comedor" rows="10" cols="30"><?=  $texto->comedor?></textarea> 
  <br><br>
  <input type="submit" value="Guardar">
</form> 