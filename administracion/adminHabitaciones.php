<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administración Hotel - Habitaciones</title>
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
      
      .centrado{
        margin: 1em 25%;
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
      $consulta = $conexion->query("SELECT * FROM habitacion ORDER BY codHabitacion ASC");
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
            <a class="navbar-brand" href="#">Administración Hotel</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li><a href="indexAdmin.php">Clientes</a></li>
              <li class="active"><a href="adminHabitaciones.php">Habitaciones</a></li>
              <!--<li><a href="#">Page 2</a></li>
              <li><a href="#">Page 3</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="indexAdmin.php"><span class="glyphicon glyphicon-user"></span> <?= ucfirst($_SESSION['nombreAdmin'])?></a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
            </ul>
          </div>
        </div>
      </nav>
     <div class="centrado">
      <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
              <tr class="bg-primary">
                <th>codHabitacion</th>
                <th>tipo</th>
                <th>capacidad</th>
                <th>Planta</th>
                <th>Edición</th>
                <th>Borrado</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while ($habitacion = $consulta->fetchObject()) {
              ?>
              <tr>
                <td><?= $habitacion->codHabitacion ?></td>
                <td><?= $habitacion->tipo ?></td>
                <td><?= $habitacion->capacidad ?></td>
                <td><?= $habitacion->planta ?></td>
                <td>
                  <form name="modificarHabitacion" action="modificarHabitacion.php" method="POST">
                    <input type="hidden"  name="codHabitacion" value="<?= $habitacion->codHabitacion ?>">
                    <input type="submit" class="btn btn-info" value="Editar" />
                  </form>
                </td>
                <td>
                  <form name="eliminarHabitacion" action="eliminarHabitacion.php" method="POST">
                    <input type="hidden"  name="codHabitacion" value="<?= $habitacion->codHabitacion ?>">
                    <input type="hidden"  name="tipo" value="<?= $habitacion->tipo ?>">
                    <input type="hidden"  name="capacidad" value="<?= $habitacion->capacidad ?>">
                    <input type="hidden"  name="planta" value="<?= $habitacion->planta ?>">
                    <input type="submit" class="btn btn-danger" value="Eliminar" />
                  </form>
                </td>
              </tr>
              <?php } ?>
            <form name="altaCliente" action="altaHabitacion.php" method="POST"> 
                <tr class="info">
                    <td>
                      <input type="text" maxlength="3" size="2" name="codHabitacion" autofocus placeholder="Cod" value="<?= $habitacion->codHabitacion ?>">
                    </td>
                    <td>
                      <input type="text" maxlength="9" size="9" name="tipo" placeholder="tipo" value="<?= $habitacion->tipo ?>">
                    </td>
                    <td>
                      <input type="text" maxlength="30" size="10" name="capacidad" placeholder="capacidad" value="<?= $habitacion->capacidad ?>">
                    </td>
                    <td>
                      <input type="txt" maxlength="30" size="10" name="planta" placeholder="planta"value="<?= $habitacion->planta ?>">
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
        header("location:login.php");
      }
    ?>
  </body>
</html>
