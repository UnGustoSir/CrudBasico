<?php include('../CrudBasico/View/Extra/header.php')?>

    <title>Insertar Nuevo Usuario</title>
</head>
<body class="d-flex justify-content-center align-items-center bg-light" style="min-height: 100vh;">

    <div class="text-center bg-white p-5 rounded shadow-lg" style="width: 100%; max-width: 500px;">
        <h1 class="mb-4">Insertar nuevo usuario</h1>

        <!-- Alertas -->
        <div class="alert alert-success" role="alert" id="Modal_Ok" hidden>Cuenta creada exitosamente</div>
        <div class="alert alert-danger" role="alert" id="Modal_err" hidden>Error al crear su cuenta</div>
        <div class="alert alert-warning" role="alert" id="Modal_exist" hidden>Ya existe ese usuario</div>
        <div class="alert alert-warning" role="alert" id="Modal_empty" hidden>Los campos están vacíos</div>

        <!-- Formulario para registrar un nuevo usuario -->
        <form action="insertUser" tControl ="usuarios" id="formAsig" method="POST" >
            <div class="mb-3">
                <label for="nameRegister" class="form-label">Nombre</label>
                <input type="text" name="nameRegister" class="form-control"  placeholder="Nombre del usuario">
            </div>
            <div class="mb-3">
                <label for="lastNameRegister" class="form-label">Apellidos</label>
                <input type="text" name="lastNameRegister" class="form-control"  placeholder="Apellidos del usuario">
            </div>
            <div class="mb-3">
                <label for="userRegister" class="form-label">Usuario</label>
                <input type="text" name="userRegister" class="form-control"  placeholder="Nombre de usuario">
            </div>
            <div class="mb-3">
                <label for="passRegister" class="form-label">Contraseña</label>
                <input type="text" name="passRegister" class="form-control"  placeholder="Contraseña">
            </div>
            <div class="mb-3">
                <label for="emailRegister" class="form-label">Correo</label>
                <input type="email" name="emailRegister" class="form-control"  placeholder="Correo electrónico">
            </div>

            <!-- Botones de acción -->
            <button type="submit" id="submitForm" class="btn btn-primary w-100 mb-2">Enviar</button>
            <a href="../CrudBasico?typeControl=usuarios&a=vistaUsers&user=<?php echo $Globaluser?>" class="btn btn-secondary w-100 text-white text-decoration-none">Volver</a>
        </form>
    </div>
    <?php include('../CrudBasico/View/Extra/scripts.php')?>

</body>
</html>
