<?php include('../CrudBasico/View/Extra/header.php')?>
    <title>Actualización de Asignación</title>
</head>
<body class="d-flex justify-content-center align-items-center bg-light" style="min-height: 100vh;">

    <div class="text-center bg-white p-5 rounded shadow-lg" style="width: 100%; max-width: 500px;">
        <h1 class="mb-4">Actualización de asignación</h1>
        
        <!-- Alertas -->
        <div class="alert alert-success" role="alert" id="Modal_Ok" hidden>Modificación exitosa</div>
        <div class="alert alert-danger" role="alert" id="Modal_err" hidden>Error al modificar la asignación</div>
        <div class="alert alert-warning" role="alert" id="Modal_empty" hidden>No puedes enviar información vacía</div>

        <!-- Formulario de actualización -->
        <form  id="formAsig" action="modifAsig" tControl="asig">
            <div class="mb-3">
                <label for="idAsig" class="form-label">ID</label>
                <input type="text" name="idAsig" class="form-control" value="<?php echo $asignacion['idAsig']?>" readonly>
            </div>
            <div class="mb-3">
                <label for="name_asig" class="form-label">Asignación</label>
                <input type="text" name="name_asig" class="form-control" value="<?php echo $asignacion['asignacion']?>" required>
            </div>
            <div class="mb-3">
                <label for="desc_asig" class="form-label">Descripción</label>
                <textarea name="desc_asig" class="form-control" rows="4" required><?php echo $asignacion['descripcion']?></textarea>
            </div>
            <div class="mb-3">
                <label for="date_asig" class="form-label">Fecha Creación</label>
                <input type="datetime-local" name="date_asig" class="form-control" value="<?php echo $asignacion['fechaCreado']?>">
            </div>
            <div class="mb-3">
                <label for="fDate_asig" class="form-label">Fecha Límite</label>
                <input type="datetime-local" name="fDate_asig" class="form-control" value="<?php echo $asignacion['fechaEntrega']?>">
            </div>

            <div class="mb-3">
                <label for="userAsig" class="form-label">Empleado Asignado</label>
                <select name="userAsig" class="form-select">
                    <option value="<?php echo $usuario['idEmpleado']?>"><?php echo $usuario['usuario']?></option>
                    <?php foreach($OtherUsers as $valor){ ?>
                        <option value="<?php echo $valor['idEmpleado']?>"><?php echo $valor['usuario']?></option>
                    <?php } ?>
                </select>
            </div>


            <!-- Botones de acción -->
            <button type="submit" id="submitForm" class="btn btn-primary w-100 mb-2">Enviar datos</button>
            <a href="../CrudBasico?typeControl=asig&a=vistaAsig&user=glc123" class="btn btn-secondary w-100 text-white text-decoration-none text-center">Volver</a>
        </form>

        <?php include('../CrudBasico/View/Extra/scripts.php')?>

    </div>

</body>
</html>
