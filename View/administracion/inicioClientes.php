<?php
  session_start();
  if ($_SESSION['logueadoAdmin']){
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Administración Hotel - Clientes</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="../../View/js/inicioClientes.js"></script>
        <link rel="icon" type="image/png" href="../../View/img/favicon.png">
        
        <style>
            #dialogoborrar{
              display: none;
            }
        
            #dialogomodificar{
              display: none;
            }
        
            #dialogoreservar{
              display: none;
            }
        
            #dialogoNuevoCliente{
              display: none;
            }
        </style> 
    </head>
    <body>
        <?php
        //if ($_SESSION['logueadoAdmin']){
        ?>
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
                            <li class="active"><a href="index.php">Clientes</a></li>
                            <li><a href="../../Controller/administracion/habitaciones.php">Habitaciones</a></li>
                            <li><a href="reservas.php">Reservas</a></li>
                            <li><a href="../../Controller/administracion/configuracionHotel.php">Configuración</a></li>
                            <!--<li><a href="#">Page 3</a></li>-->
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> <?= ucfirst($_SESSION['nombreAdmin']) ?></a></li> 
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li> 
                        </ul> <!-- ucfirst() Pone en mayúscula la primera letra-->
                    </div>
                </div>
            </nav>
            <div class="form-group">
                <form class="form-inline formularioFloatLeft" name="filtrar" action="index.php" method="GET">
                    <div class="form-group">
                        <label for="buscadorDni">DNI: </label>
                        <input type="text" class="form-control" id="buscadorDni" name="dni" 
                               placeholder="Introduce un DNI">
                    </div>
                    <button type="submit" class="btn btn-default">Filtrar</button>
                </form>
                <button id="nuevo" class="btn btn-default">Nuevo Cliente</button>
            </div>
            <div id="listaClientes" class="table-responsive">
                <?php include "../../Controller/administracion/obtieneListaClientes.php" ?>
            </div>
        </div>
    </div>
    <?php
//      }else{
    ?>
<!--      <script>
        window.location.href = "/administracion/login.php";
      </script>-->
    <?php
//      }
    ?>
    <div id="dialogoborrar" title="Eliminar Cliente">
        <p>¿Esta seguro que desea eliminar el cliente?</p>
    </div>

    <div id="dialogomodificar" title="Modificar Cliente">
        <?php include "../../View/administracion/formModificarCliente.php" ?>
    </div>

    <div id="dialogoreservar" title="Reservar Habitacion">
        <?php include "../../View/administracion/formReservarHabitacion.php" ?>
    </div> 

    <div id="dialogoNuevoCliente" title="Nuevo Cliente">
        <?php include "../../View/administracion/formNuevoCliente.php" ?>
    </div> 

</body>
</html>

<?php
    }else{
        //Error, mensaje, redirección...
        echo "Zona Inaccesible. Requiere Inicio de sesión"; //Mensaje de prueba
        ?>
            <script>
                window.location.href = "../../Controller/administracion/login.php";
            </script>
         <?php
    }