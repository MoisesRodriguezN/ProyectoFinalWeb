<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administración Hotel - Clientes</title>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    </style> 
  </head>
  <body>
    <?php
    if ($_SESSION['logueadoAdmin']){
      try {
        $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
      } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
      }
      
      
      //Buscador por DNI
      $dni = null;
      if(isset($_GET['dni'])){
        $dni=$_GET['dni'];
      }
      
      $consultaTotal = $conexion->query("SELECT * FROM cliente");
      
      $totalFilas = $consultaTotal->rowCount();
      
      
      $TAMANO_PAGINA = 10;
      $pagina = $_GET["pagina"];
      if (!isset($pagina)) {
         $inicio = 0;
         $pagina = 1;
      }
      else {
         $inicio = ($pagina - 1) * $TAMANO_PAGINA;
      }
      //calculo el total de páginas
      $totalPaginas = ceil($totalFilas / $TAMANO_PAGINA);
      
      if(isset($dni)){  //Consulta para buscador DNI
        $consulta = $conexion->query("SELECT * FROM cliente WHERE dni = '" . $dni . "' ORDER BY apellido1, apellido2, nombre LIMIT " . $inicio . "," . $TAMANO_PAGINA);
      }else{ //Consulta sin realizar búsqueda
        $consulta = $conexion->query("SELECT * FROM cliente ORDER BY apellido1, apellido2, nombre LIMIT " . $inicio . "," . $TAMANO_PAGINA);
      }
      
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
              <li><a href="adminHabitaciones.php">Habitaciones</a></li>
              <li><a href="reservas.php">Reservas</a></li>
              <!--<li><a href="#">Page 3</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> <?= ucfirst($_SESSION['nombreAdmin'])?></a></li> 
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li> 
            </ul> <!-- ucfirst() Pone en mayúscula la primera letra-->
          </div>
        </div>
      </nav>
        <div class="form-group">
          <form class="form-inline" name="filtrar" action="index.php" method="GET">
            <div class="form-group">
              <label for="buscadorDni">DNI: </label>
              <input type="text" class="form-control" id="buscadorDni" name="dni" 
                    placeholder="Introduce un DNI">
            </div>
            <button type="submit" class="btn btn-default">Filtrar</button>
          </form>
        </div>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
              <tr class="bg-primary">
                <th>CodCliente</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido 1</th>
                <th>Apellido 2</th>
                <th>Edición</th>
                <th>Reserva</th>
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
                <td>
                  <form name="modificarCliente" action="modificarCliente.php" method="POST">
                    <input type="hidden"  name="codCliente" value="<?= $cliente->codCliente ?>">
                    <input type="submit" class="btn btn-info" value="Editar" />
                  </form>
                </td>
                <td>
                  <form name="reservar" action="reservar.php" method="POST">
                    <input type="hidden"  name="codCliente" value="<?= $cliente->codCliente ?>">
                    <input type="submit" class="btn btn-success" value="Reservar" />
                  </form>
                </td>
                <td>
                  <form name="eliminarCliente" action="eliminarCliente.php" method="POST">
                    <input type="hidden"  name="codCliente" value="<?= $cliente->codCliente ?>">
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
                    </td>
                    <td colspan="2">
                      <input type="submit" class="btn btn-info" value="Añadir" />
                    </td>
                </tr>
              </form>
            <tr>
              <?php
              $url = "index.php";
              if ($totalPaginas > 1) {
                if ($pagina != 1){
                  echo '<a href="'.$url.'?pagina='.($pagina-1).'">Anterior </a>';
                }
                for ($i=1;$i<=$totalPaginas;$i++) {
                  if ($pagina == $i){
                     //si muestro el índice de la página actual, no coloco enlace
                     echo $pagina;
                  }else{
                    //si el índice no corresponde con la página mostrada actualmente,
                    //coloco el enlace para ir a esa página
                    echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.' </a>  ';
                  }
                }
                if ($pagina != $totalPaginas){
                  echo '<a href="'.$url.'?pagina='.($pagina+1).'"> Siguiente</a>';
                }
              }
              ?>
            </tbody>
        </table>
      </div>
      </div>
    </div>
    <?php
     }else{
      echo "Debes iniciar sesión para poder entrar en esta zona";
      header("location:/administracion/login.php");
     }
    ?>
  </body>
</html>
