<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Reserva de habitacion - Usuario </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body{
          background-color: aliceblue;
      }
      .contenedorForm{
          width:35%;  
          margin: 2% auto 0 auto;
      }
      .formCentrado{
          width:90%;
          margin: 0 auto;
      }
      
      .cuadroForm{
          margin: 3% auto;
          padding-bottom: 5%;
          padding-top: 5%;
          width:95%;
          background-color: lightblue;
          border-radius: 10px;
      }
      
      @media screen and (max-width: 1000px){ /*Móviles*/
          
          
          .contenedorForm{
            width:60%;  
            margin: 2% auto 0 auto;
          } 
          input[type=text]{
            height: 3rem;
            font-size: 2rem;
          }

          button[type=submit]{
            font-size: 2rem;
          }

          label{
            font-size: 2rem;
          }

          .cabeceraDivForm{
              text-align: center;
              font-size: 2rem; 
          }
      }
      
      @media screen and (max-width: 640px){ /*Móviles*/
          
          
          .contenedorForm{
            width:100%;  
            margin: 2% auto 0 auto;
          } 
          input[type=text]{
            height: 4rem;
            font-size: 2rem;
          }

          button[type=submit]{
            font-size: 2rem;
          }

          label{
            font-size: 2rem;
          }

          .cabeceraDivForm{
              text-align: center;
              font-size: 4rem; 
          }
      }
    </style>
  </head>
  <body>
      <?php
        if ( $_SESSION['logueadoUser'] == true){
          try {
            $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
          } catch (PDOException $e) {
              echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
              die ("Error: " . $e->getMessage());
          }
          
          $insercion = "INSERT INTO RESERVA (codCliente, codHabitacion,	fechaEntrada,	fechaSalida) VALUES ('$_POST[codCliente]',"
              . "'$_POST[codHabitacion]','$_POST[fechaEntrada]' ,'$_POST[fechaSalida]')";
          $conexion->exec($insercion);
          echo "Reserva realizada Correctamente";
          header( "refresh:3;url=/usuario/index.php" );
          $conexion->close();
        }else{
          header("location:/usuario/login.php");
        }
      ?>
  </body>
</html>
