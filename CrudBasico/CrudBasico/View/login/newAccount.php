<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../CrudBasico/Public/JS/Modal.js"></script>

    <title>Crear Cuenta</title>
</head>
<body class="d-flex justify-content-center align-items-center bg-light" style="height: 100vh;">

    <div class="text-center bg-white p-5 rounded shadow-lg" style="width: 100%; max-width: 400px;">
        <h1 class="mb-4">Crear Cuenta</h1>

        <!-- Alertas -->
        <div class="alert alert-success" role="alert" id="ModalAcc_ok" hidden>Cuenta creada exitosamente</div>
        <div class="alert alert-danger" role="alert" id="ModalAcc_err" hidden>Error al crear la cuenta</div>
        <div class="alert alert-warning" role="alert" id="ModalAcc_ex" hidden>El usuario ya existe</div>
        <div class="alert alert-warning" role="alert" id="ModalAcc_va" hidden>Los campos están vacíos</div>

        <!-- Formulario de Registro -->
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nameRegister" class="form-label">Nombres</label>
                <input type="text" name="nameRegister" class="form-control form-control-lg" placeholder="Nombre del usuario" >
            </div>

            <div class="mb-3">
                <label for="lastNameRegister" class="form-label">Apellidos</label>
                <input type="text" name="lastNameRegister" class="form-control form-control-lg" placeholder="Apellidos del usuario" >
            </div>

            <div class="mb-3">
                <label for="userRegister" class="form-label">Usuario</label>
                <input type="text" name="userRegister" class="form-control form-control-lg" placeholder="Nombre de usuario" >
            </div>

            <div class="mb-3">
                <label for="emailRegister" class="form-label">Correo</label>
                <input type="email" name="emailRegister" class="form-control form-control-lg" placeholder="Correo electrónico" >
            </div>

            <div class="mb-3">
                <label for="passRegister" class="form-label">Contraseña</label>
                <input type="password" name="passRegister" class="form-control form-control-lg" placeholder="Contraseña" >
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-2">Enviar</button>
            <a href="../CrudBasico" class="btn btn-secondary w-100 text-white text-decoration-none text-center">Volver</a>
        </form>
    </div>

</body>
</html>
