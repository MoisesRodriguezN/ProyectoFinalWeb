<!DOCTYPE html>
<html lang="es">
    <head>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <meta charset="UTF-8">
        <title><?= $nombreHotel->nombreHotel?> - Iniciar sesión</title>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../../View/img/favicon.png">
    </head>

    <body class="registroLogin">

        <div class="logo"><img class="logo" src="../../View/img/uploads/<?=$logo->nombre?>"></div>
        <div class="login-block">
            <h1>Login</h1>
            <?= $error ?>
            <form action="login.php" method="post">
                <input type="text" name="usuario" required placeholder="Usuario" id="username" autofocus="" />
                <input type="password" name="clave" required placeholder="Contraseña" id="password" />
                <input type="hidden" name="codHabitacion"  value="<?= $codHabitacion ?>"/>
                <input type="hidden" name="fechaEntrada" value="<?= $fechaEntrada ?>" />
                <input type="hidden" name="fechaSalida" value="<?= $fechaSalida ?>" />
                <input type="hidden" name="estadoReserva" value="<?= $reservaHab ?>" />
                <button type="submit">Entrar</button>
            </form>
            <br>
            <a href="registro.php"><button type="submit">Registrarse</button></a>
            <br>
            <br>
            <a href="../index.php"><button type="submit">Volver al inicio</button></a>
        </div>
    </body>
</html>