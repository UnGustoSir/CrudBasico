<?php include('../CrudBasico/View/Extra/header.php'); ?>

    <title>Actualización de Empleado</title>
</head>
<body class="d-flex justify-content-center align-items-center bg-light" style="min-height: 100vh;">

    <div class="text-center bg-white p-5 rounded shadow-lg" style="width: 100%; max-width: 500px;">
        <h1 class="mb-4">Actualización de empleado</h1>

        <!-- Alertas -->

        <div class="alert alert-success" role="alert" id="Modal_Ok" hidden>Empleado modificado con éxito</div>
        <div class="alert alert-danger" role="alert" id="Modal_err" hidden>Error al modificar el empleado</div>
        <div class="alert alert-warning" role="alert" id="Modal_empty" hidden>No puedes enviar información vacía</div>

        <div class="alert alert-warning" role="alert" id="Modal_exist" hidden>Este DNI ya está registrado</div>

        <!-- Formulario de actualización -->
        <form id="formAsig" action="modifEmpleado" tControl="empleado">
            <div class="mb-3">
                <label for="idEmpleado" class="form-label">Id</label>
                <input type="text" name="idEmpleado" class="form-control" value="<?php echo $idEmpleado?>" readonly>
            </div>
        
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
            <button id ="submitForm" type="submit" class="btn btn-primary w-100 mb-2">Enviar datos</button>
            <a href="../CrudBasico?typeControl=empleado&a=vistaEmploy" class="btn btn-secondary w-100 text-white text-decoration-none">Volver</a>
        </form>
    </div>
    <?php include('../CrudBasico/View/Extra/scripts.php'); ?>

</body>
</html>
