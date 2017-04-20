<?php
  session_start();
  if ($_SESSION['logueadoAdmin']){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Administración Hotel - Habitaciones</title>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
      <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  </head>
    <script src="../../View/js/inicioHabitaciones.js"></script>
  <style>
    #dialogoborrar{
      display: none;
    }

    #dialogomodificar{
      display: none;
    }
    
    #dialogoNuevaHabitacion{
      display: none;
    }
    </style> 
  <body>
    
    <div class="container">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Administración Hotel</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Clientes</a></li>
              <li class="active"><a href="habitaciones.php">Habitaciones</a></li>
              <li><a href="reservas.php">Reservas</a></li>
             <!-- <li><a href="#">Page 3</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> <?= ucfirst($_SESSION['nombreAdmin'])?></a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="centrado">
        <div id="listaHabitaciones" class="table-responsive">
          <?php include "../../Controller/administracion/obtieneListaHabitaciones.php"?>
        </div>
      </div>
    </div>
      
    <div id="dialogoborrar" title="Eliminar Cliente">
      <p>¿Esta seguro que desea eliminar la habitación?</p>
    </div>
      
    <div id="dialogomodificar" title="Modificar Cliente">
        <?php include "../../View/administracion/formModificarHabitacion.php"?>
    </div>
      
    <div id="dialogoNuevaHabitacion" title="Nueva Habitación">
        <?php include "../../view/administracion/formNuevaHabitacion.php"?>
    </div> 
  </body>
</html>
<?php
    }else{
        //Error, mensaje, redirección...
        echo "Zona Inaccesible. Requiere Inicio de sesión"; //Mensaje de prueba
    }