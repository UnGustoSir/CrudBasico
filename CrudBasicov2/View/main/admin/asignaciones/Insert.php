    <?php include('../CrudBasico/View/Extra/header.php')?>
    <title>Insertar Asignación</title>
    </head>


<body class="wrapper">

    <!-- Main content -->
    <div class="content d-flex justify-content-center align-items-center">
        <div class="text-center bg-white p-5 rounded shadow-lg" style="width: 100%; max-width: 500px;">
            <h1 class="mb-4">Insertar nueva asignación</h1>
            
            <!-- Alertas de éxito y error -->
            <div class="alert alert-success" role="alert" id="Asig_Ok" hidden>La asignación fue creada exitosamente</div>
            <div class="alert alert-danger" role="alert" id="Asig_err" hidden>Error al crear la asignación</div>
            <div class="alert alert-warning" role="alert" id="Asig_empty" hidden>Enviar información completa</div>

            <!-- Formulario de inserción -->
            <form id="formAsig" tcontrol= "asig" action="insertAsig" method="POST" >
                <div class="mb-3">
                    <label for="name_asig" class="form-label">Asignación</label>
                    <input type="text" id="name_asig" name="name_asig" class="form-control" required placeholder="Nombre de la asignación">
                </div>
                <div class="mb-3">
                    <label for="desc_asig" class="form-label">Descripción</label>
                    <textarea id="desc_asig" name="desc_asig" class="form-control" rows="4" required placeholder="Descripción detallada"></textarea>
                </div>
                <div class="mb-3">
                    <label for="date_asig" class="form-label">Fecha Límite</label>
                    <input type="datetime-local" id="date_asig" name="date_asig" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="userAsig" class="form-label">Empleado Asignado</label>
                    <select id="userAsig" name="userAsig" class="form-select" required>
                        <?php foreach($arrayUser as $valor){?>
                            <option value="<?php echo $valor['usuario']?>"><?php echo $valor['nombre'].' '.$valor['apellidos']?></option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Botones de acción -->
                <button id="submitAsig" type="submit" class="btn btn-primary w-100 mb-2">Enviar</button>
                <a href="../CrudBasico?typeControl=asig&a=vistaAsig&user=<?php echo $Globaluser?>" class="btn btn-secondary w-100 text-white text-decoration-none text-center">Volver</a>
            </form>
            
            <?php include('../CrudBasico/View/Extra/scripts.php')?>


        </div>
    </div>
</body>
</html>
