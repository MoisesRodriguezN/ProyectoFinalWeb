<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Alta de habitaciones</title>
  </head>
  <body>
      <?php
        if ( $_SESSION['logueadoAdmin'] == true){
        try {
          $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }
        
        //Comprueba que no hay ningún campo vacio
        if(empty($_POST[codHabitacion] && $_POST[tipo] && $_POST[capacidad]
          && $_POST[planta])){
          echo "Debes rellenar todos los campos";
          header( "refresh:3;url=adminHabitaciones.php" ); //Redirecciona  a la página principal.
        }else{
          $consulta = $conexion->query("SELECT codHabitacion FROM habitacion WHERE codHabitacion=".$_POST['codHabitacion']);

          if ($consulta->rowCount() > 0) {
            header( "refresh:3;url=adminHabitaciones.php" );
          ?>
            Ya existe una babitacion con Código <?= $_POST['codHabitacion'] ?><br>
            Por favor, vuelva al <a href="adminHabitaciones.php">panel de Administración del hotel</a>.
          <?php
          }else{
            $insercion = "INSERT INTO habitacion (codHabitacion, tipo, capacidad, planta, tarifa) VALUES ('$_POST[codHabitacion]',"
              . "'$_POST[tipo]','$_POST[capacidad]' ,'$_POST[planta]' ,'$_POST[tarifa]')";
            $conexion->exec($insercion);
            header( "location:adminHabitaciones.php" );
            $conexion->close();
            }
        }
          ?> 
          <?php
            }else{
              echo "Debes iniciar sesión para poder entrar en esta zona";
              header("location:login.php");
            }
          ?>
  </body>
</html>