<!DOCTYPE html>

<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <meta charset="UTF-8">
        <title>Administración Hotel - Iniciar sesión</title>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../../View/img/favicon.png">
    </head>
    <body class="registroLogin">
        <div class="logo"><img class="logo" src="../../View/img/logoLogin.png"></div>
        <div class="login-block">
            <h1>Login</h1>
            <?=$error?>
            <form action="../../Controller/administracion/login.php" method="post">
                <input type="text" name="usuario" required placeholder="Usuario" id="usuario" autofocus=""/>
                <input type="password" name="clave" required placeholder="Contraseña" id="clave" />
                <button type="submit">Entrar</button>
            </form>
        </div>
    </body>
</html>
