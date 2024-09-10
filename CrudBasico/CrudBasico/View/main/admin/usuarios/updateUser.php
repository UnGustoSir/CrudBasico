<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../CrudBasico/Public/JS/Modal.js"></script>

    <title>Actualización de Usuario</title>
</head>
<body class="d-flex justify-content-center align-items-center bg-light" style="min-height: 100vh;">

    <div class="text-center bg-white p-5 rounded shadow-lg" style="width: 100%; max-width: 600px;">
        <h1 class="mb-4">Actualización de usuario</h1>

        <!-- Alertas -->
        <div class="alert alert-success" role="alert" id="ModalAcc_ok" hidden>Modificación exitosa</div>
        <div class="alert alert-danger" role="alert" id="ModalAcc_err" hidden>Error al modificar la cuenta</div>
        <div class="alert alert-warning" role="alert" id="ModalAcc_ex" hidden>El usuario/correo ya existe</div>
        <div class="alert alert-warning" role="alert" id="MUpdUser_rell" hidden>No puedes enviar información vacía</div>

        <!-- Formulario de actualización de usuario -->
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $usuario['nombre']?>" placeholder="Nombre del usuario" >
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" value="<?php echo $usuario['apellidos']?>" placeholder="Apellidos del usuario" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" name="usuario" class="form-control" value="<?php echo $usuario['usuario']?>" placeholder="Nombre de usuario" >
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control" value="<?php echo $usuario['correo']?>" placeholder="Correo electrónico" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="text" name="pass" class="form-control" value="<?php echo $usuario['pass']?>" placeholder="Contraseña" >
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Estado</label>
                    <select name="status" class="form-select" >
                        
                        <?php echo ($usuario['status'] == 'noActive') ? '<option value="noActive">No Activo</option>' : '<option value="Active">Activo</option>'; ?>
                        <?php echo ($usuario['status'] == 'Active') ? '<option value="noActive">No Activo</option>'  : '<option value="Active">Activo</option>'; ?>
                      
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="privilege" class="form-label">Privilegio</label>
                    <select name="privilege" class="form-select" >
                    <?php echo ($usuario['privilege'] == 'user') ? '<option value="user">User</option>' : '<option value="admin">Admin</option>'; ?>
                    <?php echo ($usuario['privilege'] == 'admin') ? '<option value="user">User</option>' : '<option value="admin">Admin</option>'; ?>  
                    </select>
                </div>
            </div>


            <!-- Botones de acción -->
            <button type="submit" class="btn btn-primary w-100 mb-2">Enviar datos</button>
            <a href="../CrudBasico?typeControl=usuarios&a=vistaUsers&user=<?php echo $Globaluser?>" class="btn btn-secondary w-100 text-white text-decoration-none text-center">Volver</a>
        </form>
    </div>

</body>
</html>
