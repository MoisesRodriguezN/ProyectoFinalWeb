<?php
  session_start();
  if ($_SESSION['logueadoAdmin']){
?>
<div>
    <div class="panel panel-primary">
        <div class="panel-heading cabeceraDivForm">Modificación de clientes</div>
        <div class="cuadroForm">
            <form action="modificarCliente.php" class="formCentrado" id="formModificar" method="post">
                <div class="form-group">
                    <label for="inputCodCliente">CodCliente:</label>
                    <input type="text" name="codCliente" id="inputCodCliente" class="form-control" value="" readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="inputDni">DNI:</label>
                    <input type="text" name="DNI" id="inputDni" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="inputNobre">Nombre:</label>
                    <input type="text" name="nombre" id="inputNombre" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="inputApellido">Apellido1:</label>
                    <input type="text" name="apellido1" id="inputApellido" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="inputApellido2">Apellido2:</label>
                    <input type="text" name="apellido2" id="inputApellido2" class="form-control" value="">
                </div>
                <div class="form-group">
                    <input type="hidden" name="inputPag" id="inputPag" class="form-control" value="">
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