<div class="panel panel-primary">
    <div class="panel-heading cabeceraDivForm">Modificación de reservas</div>
      <div class="cuadroForm">
        <form action="modificarReserva.php" id="formReservar" class="formCentrado" method="post">

            <div class="form-group">
                <label for="inputCodHabitacion">codHabitacion:</label>
                <input type="text" name="codHabitacion" id="inputCodHabitacion" class="form-control" value="" readonly="readonly">
            </div>

            <div class="form-group">
                <label for="inputCodCliente">codCliente:</label>
                <input type="hidden" name="accion" value="actualizar">
                <input type="text" name="codCliente" id="inputCodCliente" class="form-control" value="" readonly="readonly">
            </div>

            <div class="form-group">
                <label for="inputDni">DNI:</label>
                <input type="text" name="DNI" id="inputDni" class="form-control" value="" readonly="readonly">
            </div>

            <div class="form-group">
                <label for="inputNobre">Nombre:</label>
                <input type="text" name="nombre" id="inputNombre" class="form-control" value="" readonly="readonly">
            </div>

            <div class="form-group">
                <label for="inputApellido">Apellido1:</label>
                <input type="text" name="apellido1" id="inputApellido" class="form-control" value="" readonly="readonly">
            </div>

            <div class="form-group">
                <label for="inputApellido2">Apellido2:</label>
                <input type="text" name="apellido2" id="inputApellido2" class="form-control" value="" readonly="readonly">
            </div>

            <div class="form-group">
                <label for="inputfechaEntrada">FechaEntrada:</label>
                <input type="hidden" name="fechaEntradaHidden" class="form-control" value="">
                <input type="date" name="fechaEntrada" id="inputfechaEntrada" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="inputFechaSalida">FechaSalida:</label>
                <input type="date" name="fechaSalida" id="inputFechaSalida2" class="form-control" value="">
            </div>
            
            <div class="form-group">
              <input type="hidden" name="inputPag" id="inputPag" class="form-control" value="">
            </div>
            
        </form>
    </div>
</div>