<?php
  session_start();
  if ($_SESSION['logueadoAdmin']){
?>
<div>
  <div class="panel panel-primary">
      <div class="panel-heading cabeceraDivForm">Reserva de habitación</div>
      <div class="cuadroForm">
          <form action="reservar.php" class="formCentrado" method="post">

          <div class="form-group">
            <label for="inputCodCliente">codCliente:</label>
            <input type="text" name="codCliente" id="inputCodClienteReservar" class="form-control" value="" readonly="readonly">
          </div>

          <div class="form-group">
            <label for="inputDni">DNI:</label>
            <input type="text" name="DNI" id="inputDniReservar" class="form-control" value="" readonly="readonly">
          </div>

          <div class="form-group">
            <label for="inputNobre">Nombre:</label>
            <input type="text" name="nombre" id="inputNombreReservar" class="form-control" value="" readonly="readonly">
          </div>

          <div class="form-group">
            <label for="inputApellido">Apellido1:</label>
            <input type="text" name="apellido1" id="inputApellidoReservar" class="form-control" value="" readonly="readonly">
          </div>

          <div class="form-group">
            <label for="inputApellido2">Apellido2:</label>
            <input type="text" name="apellido2" id="inputApellido2Reservar" class="form-control" value="" readonly="readonly">
          </div>

          <div class="form-group">
            <label for="inputCodHabitacion">codHabitacion:</label>
            <input type="text" name="codHabitacion" id="inputCodHabitacionReservar" class="form-control" value="">
          </div>

          <div class="form-group">
            <label for="inputfechaEntrada">FechaEntrada:</label>
            <input type="date" name="fechaEntrada" id="inputfechaEntradaReservar" class="form-control" value="">
          </div>

          <div class="form-group">
            <label for="inputFechaSalida">FechaSalida:</label>
            <input type="date" name="fechaSalida" id="inputFechaSalidaReservar" class="form-control" value="">
          </div>
          
        </form>
      </div>
    </div>
  </div>
<?php
    }else{
        //Error, mensaje, redirección...
        echo "Zona Inaccesible. Requiere Inicio de sesión"; //Mensaje de prueba
    }