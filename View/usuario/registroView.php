<!DOCTYPE html>
<html lang="es">
    <head>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Iniciar sesión</title>
    </head>

    <body class="registroLogin">
        <div class="logo"><img class="logo" src="../../img/logoLogin.png"></div>
        <div class="login-block">
            <h1>Login</h1>
            <?= $error ?>
            <form action="registrar.php" method="post">
                <input type="text" name="dni" required placeholder="DNI" maxlength="9" autofocus=""/>
                <input type="text" name="nombre" required placeholder="Nombre"/>
                <input type="text" name="apellido1" required placeholder="Apellido 1"/>
                <input type="text" name="apellido2" required placeholder="Apellido 2"/>
                <input type="text" name="usuario" required placeholder="Usuario"/>
                <input type="password" name="clave" required placeholder="Contraseña"/>
                <button type="submit">Registrarme</button>
            </form>
            <br>
            <a href="login.php"><button type="submit">Volver Atras</button></a>
        </div>
    </body>
</html>