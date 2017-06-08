<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Confirmar Reserva</title>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="fondoCuerpo">

        <div class="logo"><img class="logo" src="../../View/img/logoLogin.png"></div>
        <div class="login-block">
            <h1>Confirmar reserva</h1>
            <?= $error ?>

            <?php
            foreach ($data['datos'] as $datosUser) {
                ?>
                <form action="reservaConfirmada.php" name="confirmarReserva" method="POST">
                    <input type="hidden"  name="codHabitacion" value="<?= $codHabitacion ?>">
                    <input type="hidden"  name="codCliente" value="<?= $datosUser->GetCodCliente() ?>">
                    <input type="hidden"  name="probando2" value="test2">
                    <input type="text"  name="dni" value="<?= $datosUser->GetDNI() ?>" disabled>
                    <input type="text"  name="nombre" value="<?= $datosUser->GetNombre() ?>" disabled>
                    <input type="text"  name="apellido1" value="<?= $datosUser->GetApellido1() ?>" disabled>
                    <input type="text"  name="apellido2" value="<?= $datosUser->GetApellido2() ?>" disabled>
                    <input type="text"  name="fechaEntrada"  value="<?= $fechaEntrada ?>" disabled>
                    <input type="text"  name="fechaSalida" value="<?= $fechaSalida ?>" disabled>
                    <button type="submit">Confirmar</button>
                </form>
                <?php
            }
            ?>
        </div>

    </body>
</html>