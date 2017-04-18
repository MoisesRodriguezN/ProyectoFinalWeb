<?php
  session_start();
  if ($_SESSION['logueadoAdmin']){
?>
<?php

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
        foreach ($data['habitaciones'] as $habitacion) {
      ?>
      <tr id="habitacion_<?=$habitacion->getCodHabitacion()?>" data-codHabitacion="<?= $habitacion->getCodHabitacion() ?>">
        <td class="codHabitacion"><?= $habitacion->getCodHabitacion() ?></td>
        <td class="tipo"><?= $habitacion->getTipo() ?></td>
        <td class="capacidad"><?= $habitacion->getCapacidad() ?></td>
        <td class="planta"><?= $habitacion->getPlanta() ?></td>
        <td class="tarifa"><?= $habitacion->getTarifa() ?>€</td>
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
        //Error, mensaje, redirección...
        echo "Zona Inaccesible. Requiere Inicio de sesión"; //Mensaje de prueba
    }