<!--<form action="../../Controller/administracion/configuracion.php" method="post">
  Servidor:<br>
  <input type="text" value="" name="server">
  <br>
  base de datos:<br>
  <input type="text" value="" name="db"><br>
  usuario:<br>
  <input type="text" value="" name="user"><br>
  Clave:<br>
  <input type="text" value="" name="password">
  <br><br>
  <input type="submit" value="Submit">
</form>-->

<!DOCTYPE html>
<html lang="es">
    <head>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
        <script src="../../View/js/usuario/registroView.js"></script>
        <link rel="icon" type="image/png" href="../../View/img/favicon.png">
        <meta charset="UTF-8">
        <title>Configuración Inicial BBDD</title>
    </head>

    <body class="configuradorInicial">
        <div class="logo"><img class="logo" src="../../View/img/logoConfigurador.png"></div>
        <div class="login-block">
            <h1>Configuración Inicial BBDD</h1>
            <?= !empty($error) ? '<h3>' . $error . '</h3>' : '' ?>
            <form action="../../Controller/administracion/configuracion.php" method="post" id="formConfigInicial">
                <input type="text" name="server" class="camposRegistroUsusarios" placeholder="Servidor" autofocus=""/>
                <input type="text" name="db" class="camposRegistroUsusarios" placeholder="Base de datos"/>
                <input type="text" name="user" class="camposRegistroUsusarios" placeholder="Usuario"/>
                <input type="text" name="password" class="camposRegistroUsusarios" placeholder="Contraseña"/>
                <hr>
                <h5>
                    Crear Usuario y clave del adminsitrador
                </h5>
                <input type="text" name="admin" class="camposRegistroUsusarios" placeholder="Usuario administrador"/>
                <input type="text" name="adminPassword" class="camposRegistroUsusarios" placeholder="Contraseña"/>
                <button type="submit">Guardar</button>
            </form>
        </div>
    </body>
</html>

