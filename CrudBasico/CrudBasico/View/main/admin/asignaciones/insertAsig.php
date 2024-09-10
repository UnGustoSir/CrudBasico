<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../CrudBasico/Public/css/style.css" rel="stylesheet">
    <script src="../CrudBasico/Public/JS/Modal.js"></script>

    <title>Insertar Asignación</title>
</head>
<body class="wrapper">

    <!-- Main content -->
    <div class="content d-flex justify-content-center align-items-center">
        <div class="text-center bg-white p-5 rounded shadow-lg" style="width: 100%; max-width: 500px;">
            <h1 class="mb-4">Insertar nueva asignación</h1>
            
            <!-- Alertas de éxito y error -->
            <div class="alert alert-success" role="alert" id="ModalAsig_ok" hidden>La asignación fue creada exitosamente</div>
            <div class="alert alert-danger" role="alert" id="ModalAsig_err" hidden>Error al crear la asignación</div>

            <!-- Formulario de inserción -->
            <form action="" method="POST" >
                <div class="mb-3">
                    <label for="name_asig" class="form-label">Asignación</label>
                    <input type="text" name="name_asig" class="form-control" required placeholder="Nombre de la asignación">
                </div>
                <div class="mb-3">
                    <label for="desc_asig" class="form-label">Descripción</label>
                    <textarea name="desc_asig" class="form-control" rows="4" required placeholder="Descripción detallada"></textarea>
                </div>
                <div class="mb-3">
                    <label for="date_asig" class="form-label">Fecha Límite</label>
                    <input type="datetime-local" name="date_asig" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="userAsig" class="form-label">Empleado Asignado</label>
                    <select name="userAsig" class="form-select" required>
                        <?php foreach($arrayUser as $valor){?>
                            <option value="<?php echo $valor['usuario']?>"><?php echo $valor['nombre'].' '.$valor['apellidos']?></option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Botones de acción -->
                <button type="submit" class="btn btn-primary w-100 mb-2">Enviar</button>
                <a href="../CrudBasico?typeControl=asig&a=vistaAsig&user=<?php echo $Globaluser?>" class="btn btn-secondary w-100 text-white text-decoration-none text-center">Volver</a>
            </form>
        </div>
    </div>
</body>
</html>
