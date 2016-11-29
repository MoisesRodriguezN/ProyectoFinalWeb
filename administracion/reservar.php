<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Reserva de habitacion</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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
        if ( $_SESSION['logueadoAdmin'] == true){
        try {
          $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }
        
        $consulta = $conexion->query("SELECT * FROM cliente c "
        . "WHERE c.codCliente=\"$_POST[codCliente]\"");
        $reserva = $consulta->fetchObject();
        $accion = $_POST['accion'];
         
        if ($accion == "actualizar"){
          $insercion = "INSERT INTO RESERVA (codCliente, codHabitacion,	fechaEntrada,	fechaSalida) VALUES ('$_POST[codCliente]',"
              . "'$_POST[codHabitacion]','$_POST[fechaEntrada]' ,'$_POST[fechaSalida]')";
          $conexion->exec($insercion);

          echo "Reserva realizada Correctamente";
          header( "refresh:1;url=reservas.php" );
          $conexion->close();
        }else{
      ?>
        <div class="contenedorForm">
          <div class="panel panel-primary">
              <div class="panel-heading cabeceraDivForm">Reserva de habitacion</div>
              <div class="cuadroForm">
                  <form action="reservar.php" class="formCentrado" method="post">
                                       
                  <div class="form-group">
                    <label for="inputCodCliente">codCliente:</label>
                    <input type="hidden" name="accion" value="actualizar">
                    <input type="text" name="codCliente" id="inputCodCliente" class="form-control" value="<?= $reserva->codCliente ?>" readonly="readonly">
                  </div>
 
                  <div class="form-group">
                    <label for="inputDni">DNI:</label>
                    <input type="text" name="DNI" id="inputDni" class="form-control" value="<?= $reserva->DNI ?>" readonly="readonly">
                  </div>

                  <div class="form-group">
                    <label for="inputNobre">Nombre:</label>
                    <input type="text" name="nombre" id="inputNombre" class="form-control" value="<?= $reserva->nombre ?>" readonly="readonly">
                  </div>

                  <div class="form-group">
                    <label for="inputApellido">Apellido1:</label>
                    <input type="text" name="apellido1" id="inputApellido" class="form-control" value="<?= $reserva->apellido1 ?>" readonly="readonly">
                  </div>

                  <div class="form-group">
                    <label for="inputApellido2">Apellido2:</label>
                    <input type="text" name="apellido2" id="inputApellido2" class="form-control" value="<?= $reserva->apellido2 ?>" readonly="readonly">
                  </div>
                        
                  <div class="form-group">
                    <label for="inputCodHabitacion">codHabitacion:</label>
                    <input type="text" name="codHabitacion" id="inputCodHabitacion" class="form-control" value="">
                  </div>
                      
                  <div class="form-group">
                    <label for="inputfechaEntrada">FechaEntrada:</label>
                    <input type="date" name="fechaEntrada" id="inputfechaEntrada" class="form-control" value="">
                  </div>
                    
                  <div class="form-group">
                    <label for="inputFechaSalida">FechaSalida:</label>
                    <input type="date" name="fechaSalida" id="inputFechaSalida2" class="form-control" value="">
                  </div>
                  <button type="submit" class="btn btn-default">Enviar</button>
                </form>
              </div>
            </div>
          </div>
      <?php
        }
      ?> 
      <?php
        }else{
          header("location:/administracion/login.php");
        }
      ?>
  </body>
</html>
