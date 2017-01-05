<?php
session_start();
if ($_SESSION['logueadoAdmin'] == true) {
  try {
    $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
  } catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
  }

  //Cálculos paginación
  $consultaTotal = $conexion->query("SELECT * FROM reserva");
  $totalFilas = $consultaTotal->rowCount();

  $TAMANO_PAGINA = 3;
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
  //Fin cálculos paginación
  
  $orderBy = "ORDER BY r.fechaEntrada ASC, r.codHabitacion"; //Orden por defecto
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
  $consulta = $conexion->query("SELECT * FROM reserva r "
    . "JOIN habitacion h ON (r.codHabitacion = h.codHabitacion) "
    . "JOIN cliente c ON (c.codCliente = r.codCliente) " 
    . $orderBy . " LIMIT " . $inicio . "," . $TAMANO_PAGINA);
  
    $opcionesOrden = array();
    $opcionesOrden["codHabitacion"] = "codCliente";
    $opcionesOrden["nombre"] = "nombre";
    $opcionesOrden["apellido1"] = "Apellido1";
    $opcionesOrden["dni"] = "DNI";
    $opcionesOrden["fechaEntrada"] = "Fecha Entrada";
    $opcionesOrden["fechaSalida"] = "Fecha Salida";

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
              <th>codHabitacion</th>
              <th>Nombre</th>
              <th>Apellido1</th>
              <th>Apellido2</th>
              <th>DNI</th>
              <th>Fecha Entrada</th>
              <th>Fecha Salida</th>
              <th>Edición</th>
              <th>Borrado</th>
          </tr>
      </thead>
      <tbody>
          <?php
          while ($reserva = $consulta->fetchObject()) {
            ?>
            <tr id="reserva_<?= $reserva->codHabitacion, $reserva->codCliente, $reserva->fechaEntrada ?>" data-codHabitacion="<?= $reserva->codHabitacion?>" data-codCliente="<?=$reserva->codCliente?>" data-fechaEntrada="<?=$reserva->fechaEntrada ?>">
                <td class="codHabitacion"><?= $reserva->codHabitacion ?></td>
                <td class="nombre"><?= $reserva->nombre ?></td>
                <td class="apellido1"><?= $reserva->apellido1 ?></td>
                <td class="apellido2"><?= $reserva->apellido2 ?></td>
                <td class="dni"><?= $reserva->DNI ?></td>
                <td class="fechaEntrada"><?= $reserva->fechaEntrada ?></td>
                <td class="fechaSalida"><?= $reserva->fechaSalida ?></td>
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
}
?>

