<?php
  session_start();
  if ($_SESSION['logueadoAdmin']){
?>
<div>
    <div class="panel panel-primary">
        <div class="panel-heading cabeceraDivForm">Nuevo Cliente</div>
        <div class="cuadroForm">
            <form action="" class="formCentrado" id="formNuevoCliente" method="post">

                <div class="form-group">
                    <label for="dniNuevo">DNI:</label>
                    <input type="text" name="DNI" id="dniNuevo" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="nombreNuevo">Nombre:</label>
                    <input type="text" name="nombre" id="nombreNuevo" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="apellido1Nuevo">Apellido1:</label>
                    <input type="text" name="apellido1" id="apellido1Nuevo" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="apellido2Nuevo">Apellido2:</label>
                    <input type="text" name="apellido2" id="apellido2Nuevo" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="usuarioNuevo">Usuario:</label>
                    <input type="text" name="nombreUsuario" id="usuarioNuevo" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="claveNueva">Contraseña:</label>
                    <input type="password" name="clave" id="claveNueva" class="form-control" value="">
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