<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../CrudBasico/Public/JS/Modal.js"></script>

    <title>Login</title>
</head>
<body class="d-flex justify-content-center align-items-center bg-light" style="height: 100vh;">

    <div class="text-center bg-white p-5 rounded shadow-lg" style="width: 100%; max-width: 400px;">
        <h1 class="mb-4">Login</h1>

        <!-- Alertas -->
        <div class="alert alert-danger" role="alert" id="ModalLog_Inc" hidden>Correo o contraseña incorrectos</div>
        <div class="alert alert-danger" role="alert" id="ModalLog_NoExis" hidden>El usuario no existe</div>
        <div class="alert alert-warning" role="alert" id="ModalLog_Com" hidden>Los campos están vacíos</div>
        <div class="alert alert-warning" role="alert" id="ModalAcc_act" hidden>El usuario aún no está activo</div>

        <!-- Formulario de login -->
        <form action="" method="POST" class="p-4">
            <div class="mb-3">
                <label for="user" class="form-label">Usuario</label>
                <input type="text" name="user" class="form-control form-control-lg"  placeholder="Ingrese su usuario">
            </div>

            <div class="mb-3">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" name="pass" class="form-control form-control-lg"  placeholder="Ingrese su contraseña">
            </div>

            <!-- Botones de acción -->
            <button type="submit" class="btn btn-primary w-100 mb-2">Ingresar</button>
            <a href="../CrudBasico?typeControl=login&a=vistaRegister" class="btn btn-secondary w-100 text-white text-decoration-none text-center">Crear Cuenta</a>
        </form>
    </div>

</body>
</html>
