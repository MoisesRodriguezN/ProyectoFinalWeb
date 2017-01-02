 <div class="panel panel-primary">
    <div class="panel-heading cabeceraDivForm">Modificación de habitaciones</div>
    <div class="cuadroForm">
      <form action="modificarHabitacion.php" class="formCentrado" id="formModificar" method="post">
        <div class="form-group">
          <label for="inputcodHabitacion">codHabitacion:</label>
          <input type="hidden" name="accion" value="actualizar">
          <input type="text" name="codHabitacion" id="inputCodHabitacion" class="form-control" value="<?= $habitacion->codHabitacion ?>" readonly="readonly">
        </div>

        <div class="form-group">
          <label for="inputTipo">Tipo:</label>
          <input type="text" name="tipo" id="inputTipo" class="form-control" value="<?= $habitacion->tipo ?>">
        </div>

        <div class="form-group">
          <label for="inputCapacidad">Capacidad:</label>
          <input type="text" name="capacidad" id="inputCapacidad" class="form-control" value="<?= $habitacion->capacidad ?>">
        </div>

        <div class="form-group">
          <label for="inputPlanta">Planta:</label>
          <input type="text" name="planta" id="inputPlanta" class="form-control" value="<?= $habitacion->planta ?>">
        </div>

        <div class="form-group">
          <label for="inputTarifa">Tarifa:</label>
          <input type="text" name="tarifa" id="inputTarifa" class="form-control" value="<?= $habitacion->tarifa ?>">
        </div>
      </form>
    </div>
  </div>