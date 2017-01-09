<?php
  session_start(); // Inicio de sesión
?>
  <?php
  if ($_SESSION['logueadoAdmin']){
    try {
      $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
    } catch (PDOException $e) {
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
      die ("Error: " . $e->getMessage());
    }

    //Buscador por DNI
    //filtro por DNI
    $dni = null;
    if(isset($_GET['dni']) && !empty($_GET['dni'])){
      $dni=$_GET['dni'];
    }
    
    if(isset($dni)){  //Consulta para buscador DNI
      $consultaTotal = $conexion->query("SELECT * FROM cliente WHERE dni LIKE '%" . $dni . "%'");
    }else{ //Consulta sin realizar búsqueda
      $consultaTotal = $conexion->query("SELECT * FROM cliente");
    }

    $totalFilas = $consultaTotal->rowCount();

    $TAMANO_PAGINA = 10;
    $pagina = $_REQUEST["pagina"];

    if(empty($pagina)){
      $pagina = 1;
    }
    if (!isset($pagina)) {
       $inicio = 0;
       $pagina = 1;
    } else {
       $inicio = ($pagina - 1) * $TAMANO_PAGINA;
    }
    //calculo el total de páginas
    $totalPaginas = ceil($totalFilas / $TAMANO_PAGINA);

    $orderBy = "ORDER BY apellido1, apellido2, nombre"; //Orden por defecto
    $orden = $_REQUEST["orden"];
    if (!empty($orden)) {
       $orderBy = "ORDER BY ". $orden;
    }

    $tipoOrden = $_REQUEST["tipoOrden"];
    if (!empty($tipoOrden)) {
      $orderBy .= " " . $tipoOrden;
    }else{
      $orderBy .= " ASC"; //Orden por defecto
    }
    
    if(isset($dni)){  //Consulta para buscador DNI
      $consulta = $conexion->query("SELECT * FROM cliente WHERE dni LIKE '%" . $dni . "%' " . $orderBy . " LIMIT " . $inicio . "," . $TAMANO_PAGINA);
    }else{ //Consulta sin realizar búsqueda
      $consulta = $conexion->query("SELECT * FROM cliente " . $orderBy . " LIMIT " . $inicio . "," . $TAMANO_PAGINA);
    }

    $opcionesOrden = array();
    $opcionesOrden["codCliente"] = "codCliente";
    $opcionesOrden["dni"] = "DNI";
    $opcionesOrden["nombre"] = "Nombre";
    $opcionesOrden["apellido1"] = "Apellido 1";
    $opcionesOrden["apellido2"] = "Apellido 2";

    $tiposOrden = array();
    $tiposOrden["asc"] = "Ascendente";
    $tiposOrden["desc"] = "Descendente";

  ?>  
<div class="ordenar">
  <select name="orden">
     <?php
         foreach ($opcionesOrden as $clave => $valor) {
           $selected = "";
           if ($clave == $orden){
              $selected = "selected";
           }
           echo "<option ". $selected ." value='" . $clave . "'>" . $valor . "</option>\n";
         }
     ?>
  </select> 
    
  <select name="tipoOrden">
    <?php
        foreach ($tiposOrden as $clave => $valor) {
          $selected = "";
          if ($clave == $tipoOrden){
             $selected = "selected";
          }
          echo "<option ". $selected ." value='" . $clave . "'>" . $valor . "</option>\n";
        }
    ?>
  </select>
  <button type="button" class="btn btn-info btn-ordenar">Ordenar</button>
</div>
<table id="tabladatos" class="table table-striped table-hover" data-orden="<?=$orden?>" data-tipo-orden="<?=$tipoOrden?>">
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
        <tr id="cliente_<?=$cliente->codCliente?>" data-codCliente="<?= $cliente->codCliente ?>">
          <td class="codCliente"><?= $cliente->codCliente ?></td>
          <td class="dni"><?= $cliente->DNI ?></td>
          <td class="nombre"><?= $cliente->nombre ?></td>
          <td class="apellido"><?= $cliente->apellido1 ?></td>
          <td class="apellido2"><?= $cliente->apellido2 ?></td>
          <td>
            <button type="button" class="btn btn-info btn-modificar">Modificar</button>
          </td>
          <td>
              <!--
            <form name="reservar" action="reservar.php" method="POST">
              <input type="hidden"  name="codCliente" value="<?= $cliente->codCliente ?>">
              <input type="submit" class="btn btn-success" value="Reservar" />
            </form>-->
             <button type="button" class="btn btn-success btn-reservar">Reservar</button>
          </td>
          <td>
              <button type="button" class="btn btn-danger btn-eliminar">Eliminar</button>
          </td>
        </tr>
      <?php } ?>

    </tbody>
</table>
<div class="paginacion">
      <?php
        $url = "index.php";
        if ($totalPaginas > 1) {
          if ($pagina != 1){
            echo '<a href data-pagina="'.($pagina-1).'"> Anterior</a>';
          }
          for ($i=1;$i<=$totalPaginas;$i++) {
            if ($pagina == $i){
               //si muestro el índice de la página actual, no coloco enlace
               echo "<spam class='pagActual'> " ,$pagina , " </spam>";
            }else{
              //si el índice no corresponde con la página mostrada actualmente,
              //coloco el enlace para ir a esa página
              echo '  <a href data-pagina="'.$i.'">'.$i.' </a>  ';
            }
          }
          if ($pagina != $totalPaginas){
            echo '<a href data-pagina="'.($pagina+1).'"> Siguiente</a>';
          }
        }
        ?>
</div>
<?php
 }else{
  header("location:/administracion/login.php");
 }
?>
