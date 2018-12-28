<!DOCTYPE html>
<html lang="es">
    <head>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
        <script>
            $(document).ready(function(){
//                $("#claveUser").focusin(function(){
//                    $("#nombreUser").fadeOut(300, function(){
//                        $("#claveUserComprueba").fadeIn(200);
//                    });    
//                });
                
                $("#formModificar").validate({
                  rules: {
                      nombre: {required: true, maxlength: 9}
                  },
                  messages: {
                      nombre: "Debe introducir el código numérico del cliente."
                  }
                });
            });
            
            

        </script>
        
        <style>
            #claveUserComprueba{
                display: none;
            }
        </style>
        <meta charset="UTF-8">
        <title>Iniciar sesión</title>
    </head>

    <body class="registroLogin">

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

    </body>
</html>