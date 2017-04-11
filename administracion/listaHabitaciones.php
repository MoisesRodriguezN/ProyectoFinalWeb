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
    $consultaTotal = $conexion->query("SELECT * FROM habitacion");

    $totalFilas = $consultaTotal->rowCount();

    $TAMANO_PAGINA = 10;
    $pagina = $_REQUEST["pagina"];
    if (!isset($pagina)) {
       $inicio = 0;
       $pagina = 1;
    }
    else {
       $inicio = ($pagina - 1) * $TAMANO_PAGINA;
    }
    //calculo el total de páginas
    $totalPaginas = ceil($totalFilas / $TAMANO_PAGINA);
    //$consulta = $conexion->query("SELECT * FROM habitacion ORDER BY codHabitacion ASC LIMIT " . $inicio . "," . $TAMANO_PAGINA);

    $orderBy = "ORDER BY tipo, capacidad, planta, tarifa"; //Orden por defecto
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

    $consulta = $conexion->query("SELECT * FROM habitacion " . $orderBy . " LIMIT " . $inicio . "," . $TAMANO_PAGINA);

    $opcionesOrden = array();
    $opcionesOrden["codHabitacion"] = "codHabitacion";
    $opcionesOrden["tipo"] = "Tipo";
    $opcionesOrden["capacidad"] = "Capacidad";
    $opcionesOrden["planta"] = "Planta";
    $opcionesOrden["tarifa"] = "Tarifa";

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
    <button id="nuevo" class="btn btn-default">Nueva Habitación</button>
  </div>
  <table id="tabladatos" class="table table-striped table-hover" data-orden="<?=$orden?>" data-tipo-orden="<?=$tipoOrden?>">
    <thead>
      <tr class="bg-primary">
        <th>codHabitacion</th>
        <th>tipo</th>
        <th>capacidad</th>
        <th>Planta</th>
        <th>Tarifa</th>
        <th>Edición</th>
        <th>Borrado</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($habitacion = $consulta->fetchObject()) {
      ?>
      <tr id="habitacion_<?=$habitacion->codHabitacion?>" data-codHabitacion="<?= $habitacion->codHabitacion ?>">
        <td class="codHabitacion"><?= $habitacion->codHabitacion ?></td>
        <td class="tipo"><?= $habitacion->tipo ?></td>
        <td class="capacidad"><?= $habitacion->capacidad ?></td>
        <td class="planta"><?= $habitacion->planta ?></td>
        <td class="tarifa"><?= $habitacion->tarifa ?>€</td>
        <td>
          <button type="button" class="btn btn-info btn-modificar">Modificar</button>
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



