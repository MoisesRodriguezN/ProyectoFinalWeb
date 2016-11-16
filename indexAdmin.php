<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administración Hotel - Clientes</title>
      <link href="http://meyerweb.com/eric/tools/css/reset/reset.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
     
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      input[type="number"]{
        width:80px;
      }
      
      .container{
        width: 95%;
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
      $consulta = $conexion->query("SELECT * FROM cliente JOIN habitacion ON "
        . "cliente.codHabitacion=habitacion.codHabitacion ORDER BY fechaInicial ASC");
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
              <a class="navbar-brand" href="indexAdmin.php">Administración Hotel</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="indexAdmin.php">Clientes</a></li>
              <li><a href="adminHabitaciones.php">Habitaciones</a></li>
              <!--<li><a href="#">Page 2</a></li>
              <li><a href="#">Page 3</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="indexAdmin.php"><span class="glyphicon glyphicon-user"></span> <?= ucfirst($_SESSION['nombreAdmin'])?></a></li> 
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li> 
            </ul> <!-- ucfirst() Pone en mayúscula la primera letra-->
          </div>
        </div>
      </nav>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
              <tr class="bg-primary">
                <th>CodCliente</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido 1</th>
                <th>Apellido 2</th>
                <th>Fecha Inicial</th>
                <th>Fecha Final</th>
                <th>Tarifa</th>
                <th>Habitación</th>
                <th>Edición</th>
                <th>Borrado</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while ($cliente = $consulta->fetchObject()) {
              ?>
              <tr>
                <td><?= $cliente->codCliente ?></td>
                <td><?= $cliente->DNI ?></td>
                <td><?= $cliente->nombre ?></td>
                <td><?= $cliente->apellido1 ?></td>
                <td><?= $cliente->apellido2 ?></td>
                <td><?= $cliente->fechaInicial ?></td>
                <td><?= $cliente->fechaFinal ?></td>
                <td><?= $cliente->tarifa ?></td>
                <td><?= $cliente->codHabitacion?></td>
                <td>
                  <form name="modificarCliente" action="modificarCliente.php" method="POST">
                    <input type="hidden"  name="codCliente" value="<?= $cliente->codCliente ?>">
                    <input type="submit" class="btn btn-info" value="Editar" />
                  </form>
                </td>
                <td>
                  <form name="eliminarCliente" action="eliminarCliente.php" method="POST">
                    <input type="hidden"  name="codCliente" value="<?= $cliente->codCliente ?>">
                    <input type="hidden"  name="DNI" value="<?= $cliente->DNI ?>">
                    <input type="hidden"  name="nombre" value="<?= $cliente->nombre ?>">
                    <input type="hidden"  name="apellido1" value="<?= $cliente->apellido1 ?>">
                    <input type="hidden"  name="apellido2" value="<?= $cliente->apellido2 ?>">
                    <input type="hidden"  name="fechaInicial" value="<?= $cliente->fechaInicial ?>">
                    <input type="hidden"  name="fechaFinal" value="<?= $cliente->fechaFinal ?>">
                    <input type="hidden"  name="tarifa" value="<?= $cliente->tarifa ?>">
                    <input type="hidden"  name="codHabitacion" value="<?= $cliente->codHabitacion?>">
                    <input type="submit" class="btn btn-danger" value="Eliminar" />
                  </form>
                </td>
              </tr>
              <?php } ?>
            <form name="altaCliente" action="altaCliente.php" method="POST"> 
                <tr class="info">
                    <td>
                      <input type="text" maxlength="3" size="2" name="codCliente" autofocus placeholder="Cod" value="<?= $cliente->codCliente ?>">
                    </td>
                    <td>
                      <input type="text" maxlength="9" size="9" name="DNI" placeholder="DNI" value="<?= $cliente->DNI ?>">
                    </td>
                    <td>
                      <input type="text" maxlength="30" size="10" name="nombre" placeholder="Nombre" value="<?= $cliente->nombre ?>">
                    </td>
                    <td>
                      <input type="txt" maxlength="30" size="10" name="apellido1" placeholder="Apellido 1"value="<?= $cliente->apellido1 ?>">
                    </td>
                    <td>
                      <input type="text" maxlength="30" size="10" name="apellido2" placeholder="Apellido2" value="<?= $cliente->apellido2 ?>">
                    </td>
                    <td>
                      <input type="date" maxlength="10" size="10" name="fechaInicial" placeholder="dd/mm/aaaa" value="<?= $cliente->fechaInicial ?>">
                    </td>
                    <td>
                      <input type="date" maxlength="10" size="10" name="fechaFinal" placeholder="dd/mm/aaaa" value="<?= $cliente->fechaFinal ?>">
                    </td>
                    <td>
                      <input type="number" step=0.01 min=0 name="tarifa" placeholder="Tarifa" value="<?= $cliente->tarifa ?>">
                    </td>
                    <td>
                      <input type="text" maxlength="4" size="2" name="codHabitacion" placeholder="Hab" value="<?= $cliente->codHabitacion?>">
                    </td>
                    <td colspan="2">
                      <input type="submit" class="btn btn-info" value="Añadir" />
                    </td>
                </tr>
              </form>
            </tbody>
        </table>
      </div>
      </div>
    </div>
    <?php
     }else{
      echo "Debes iniciar sesión para poder entrar en esta zona";
      header("Refresh: 3; url=login.php", true, 303);
     }
    ?>
  </body>
</html>
