<?php
  session_start();
  if ($_SESSION['logueadoAdmin']){
?>
<?php
    $opcionesOrden = array();
    $opcionesOrden["h.codHabitacion"] = "codCliente";
    $opcionesOrden["c.nombre"] = "nombre";
    $opcionesOrden["c.apellido1"] = "Apellido1";
    $opcionesOrden["c.dni"] = "DNI";
    $opcionesOrden["r.fechaEntrada"] = "Fecha Entrada";
    $opcionesOrden["r.fechaSalida"] = "Fecha Salida";

    $tiposOrden = array();
    $tiposOrden["asc"] = "Ascendente";
    $tiposOrden["desc"] = "Descendente";
    ?>  

    <div class="ordenar">
        <select name="orden">
            <?php
            foreach ($opcionesOrden as $clave => $valor) {
                $selected = "";
                if ($clave == $orden) {
                    $selected = "selected";
                }
                echo "<option " . $selected . " value='" . $clave . "'>" . $valor . "</option>\n";
            }
            ?>
        </select> 

        <select name="tipoOrden">
            <?php
            foreach ($tiposOrden as $clave => $valor) {
                $selected = "";
                if ($clave == $tipoOrden) {
                    $selected = "selected";
                }
                echo "<option " . $selected . " value='" . $clave . "'>" . $valor . "</option>\n";
            }
            ?>
        </select>
        <button type="button" class="btn btn-info btn-ordenar">Ordenar</button>
    </div>
    <table id="tabladatos" class="table table-striped table-hover" data-orden="<?= $orden ?>" data-tipo-orden="<?= $tipoOrden ?>">
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
            foreach ($data['reservas'] as $reserva) {
                ?>
                <tr id="reserva_<?= $reserva->getCodHabitacion(), $reserva->getCodCliente(), $reserva->getFechaEntrada() ?>" data-codHabitacion="<?= $reserva->getCodHabitacion() ?>" data-codCliente="<?= $reserva->getCodCliente() ?>" data-fechaEntrada="<?= $reserva->getFechaEntrada()?>">
                    <td class="codHabitacion"><?= $reserva->getCodHabitacion() ?></td>
                    <td class="nombre"><?= $reserva->getNombre() ?></td>
                    <td class="apellido1"><?= $reserva->getApellido1() ?></td>
                    <td class="apellido2"><?= $reserva->getApellido2() ?></td>
                    <td class="dni"><?= $reserva->getDni() ?></td>
                    <td class="fechaEntrada"><?= $reserva->getFechaEntrada() ?></td>
                    <td class="fechaSalida"><?= $reserva->getFechaSalida() ?></td>
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
            if ($pagina != 1) {
                echo '<a href data-pagina="' . ($pagina - 1) . '"> Anterior</a>';
            }
            for ($i = 1; $i <= $totalPaginas; $i++) {
                if ($pagina == $i) {
                    //si muestro el índice de la página actual, no coloco enlace
                    echo "<spam class='pagActual'> ", $pagina, " </spam>";
                } else {
                    //si el índice no corresponde con la página mostrada actualmente,
                    //coloco el enlace para ir a esa página
                    echo '  <a href data-pagina="' . $i . '">' . $i . ' </a>  ';
                }
            }
            if ($pagina != $totalPaginas) {
                echo '<a href data-pagina="' . ($pagina + 1) . '"> Siguiente</a>';
            }
        }
        ?>
    </div>
<?php
    }else{
        //Error, mensaje, redirección...
        echo "Zona Inaccesible. Requiere Inicio de sesión"; //Mensaje de prueba
    }