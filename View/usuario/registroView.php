<!DOCTYPE html>
<html lang="es">
    <head>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
        <script src="../../View/js/usuario/registroView.js"
        <script>
//            $(document).ready(function(){
//                $("#claveUser").focusin(function(){
//                    $("#nombreUser").fadeOut(300, function(){
//                        $("#claveUserComprueba").fadeIn(200);
//                    });    
//                });
//                
//                $(".camposRegistroUsusarios").dblclick(function(){
//                    $("#claveUserComprueba").fadeOut(300, function(){
//                        $("#nombreUser").fadeIn(200);
//                    });    
//                });
//                                        
//                
//                $("#formRegistroUsusarios").validate({
//                  rules: {
//                    clave: {required: true, minlength: 6, maxlength: 20},
//                      claveComprueba: {
//                        equalTo: "#claveUser"
//                      },
//                      
//                      dni: {required: true, minlength: 9, maxlength: 9},
//                      
//                      nombre: {required: true},
//                      apellido1: {required: true},
//                      apellido2: {required: true},
//                      usuario: {required: true}
//
//
//                  },
//                  messages: {
//                      clave: "Clave de 6 carácteres mínimo",
//                      dni: "Introduce un DNI válido",
//                       nombre: "Introduce un nombre",
//                      apellido1: "El campo está requerido",
//                      apellido2: "El campo está requerido",
//                      usuario: "El campo está requerido",
//                      claveComprueba: "Introduce la misma clave"
//                  },
//                  
//                  errorPlacement: function(error, element) {
//                        error.insertBefore(element);
//                    }
//                });
//            });
            
            

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
        <div class="logo"><img class="logo" src="../../View/img/logoLogin.png"></div>
        <div class="login-block">
            <h1>Login</h1>
            <?= $error ?>
            <form action="registrar.php" method="post" id="formRegistroUsusarios">
                <input type="text" name="dni" class="camposRegistroUsusarios" placeholder="DNI" minlength="9" maxlength="9" autofocus=""/>
                <input type="text" name="nombre" class="camposRegistroUsusarios" placeholder="Nombre"/>
                <input type="text" name="apellido1" class="camposRegistroUsusarios" placeholder="Apellido 1"/>
                <input type="text" name="apellido2" class="camposRegistroUsusarios" placeholder="Apellido 2"/>
                <input type="text" name="usuario" id="nombreUser"  placeholder="Usuario"/>
                <input type="password" name="clave" id="claveUser"  minlength="6" maxlength="16" placeholder="Contraseña"/>
                <input type="password" name="claveComprueba" id="claveUserComprueba" minlength="6" maxlength="16" placeholder=" Repetir Contraseña"/>
                <button type="submit">Registrarme</button>
            </form>
            <br>
            <a href="login.php"><button type="submit">Volver Atras</button></a>
        </div>
    </body>
</html>