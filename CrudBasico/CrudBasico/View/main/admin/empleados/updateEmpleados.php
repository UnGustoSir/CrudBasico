<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../CrudBasico/Public/JS/Modal.js"></script>

    <title>Actualización de Empleado</title>
</head>
<body class="d-flex justify-content-center align-items-center bg-light" style="min-height: 100vh;">

    <div class="text-center bg-white p-5 rounded shadow-lg" style="width: 100%; max-width: 500px;">
        <h1 class="mb-4">Actualización de empleado</h1>

        <!-- Alertas -->
        <div class="alert alert-warning" role="alert" id="MUpdEmploy_dni" hidden>Este DNI ya está registrado</div>
        <div class="alert alert-success" role="alert" id="MUpdEmploy_ok" hidden>Empleado modificado con éxito</div>

        <!-- Formulario de actualización -->
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nom_form" class="form-label">Nombre</label>
                <input type="text" name="nom_form" class="form-control" value="<?php echo $empleado['nombre']?>" required>
            </div>
            <div class="mb-3">
                <label for="lastNom_form" class="form-label">Apellidos</label>
                <input type="text" name="lastNom_form" class="form-control" value="<?php echo $empleado['apellidos']?>" required>
            </div>
            <div class="mb-3">
                <label for="dni_form" class="form-label">DNI</label>
                <input type="text" name="dni_form" class="form-control" value="<?php echo $empleado['dni']?>" required>
            </div>
            <div class="mb-3">
                <label for="puesto_form" class="form-label">Puesto</label>
                <input type="text" name="puesto_form" class="form-control" value="<?php echo $empleado['puesto']?>" required>
            </div>

            <!-- Botones de acción -->
            <button type="submit" class="btn btn-primary w-100 mb-2">Enviar datos</button>
            <a href="../CrudBasico?typeControl=empleado&user=<?php echo $user?>" class="btn btn-secondary w-100 text-white text-decoration-none">Volver</a>
        </form>
    </div>

</body>
</html>
