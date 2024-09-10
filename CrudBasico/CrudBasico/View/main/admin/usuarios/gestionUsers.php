<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../CrudBasico/Public/css/style.css" rel="stylesheet">

    <title>Gestión de Usuarios</title>
</head>
<body>
    <div class="wrapper">
    <?php include('../CrudBasico/View/Extra/sidebard.php')?>



        <!-- Main Content -->
        <div class="content">
            <div class="text-center py-4">
                <h1 class="mb-4">Usuarios</h1>

                <!-- Tabla de usuarios -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Correo</th>
                                <th>Fecha de Creación</th>
                                <th>Última Actualización</th>
                                <th>Status</th>
                                <th>Privilegios</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($arrayUsers as $result){
                                    echo '<tr>';
                                        echo '<td>'.$result['idUser'].'</td>';
                                        echo '<td>'.$result['nombre'].'</td>';
                                        echo '<td>'.$result['apellidos'].'</td>';
                                        echo '<td>'.$result['usuario'].'</td>';
                                        echo '<td>'.$result['pass'].'</td>';
                                        echo '<td>'.$result['correo'].'</td>';
                                        echo '<td>'.$result['fechaCreado'].'</td>';
                                        echo '<td>'.$result['fechaCambio'].'</td>';
                                        echo '<td>'.$result['status'].'</td>';
                                        echo '<td>'.$result['privilege'].'</td>';
                                        echo '<td class="d-flex justify-content-center gap-2">';
                                            echo '<a href="../CrudBasico?typeControl=usuarios&a=deleteUser&idUser='.$result['idUser'].'&user='.$user.'" class="btn btn-danger btn-sm">Eliminar</a>';
                                            echo '<a href="../CrudBasico?typeControl=usuarios&a=modifUser&idUser='.$result['idUser'].'&user='.$user.'" class="btn btn-warning btn-sm">Modificar</a>';
                                        echo '</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Botones de acción -->
                <div class="mt-4">
                    <a href="../CrudBasico?typeControl=usuarios&a=insertUser&user=<?php echo $user?> " class="btn btn-success">Insertar Usuario</a>
                    <a href="../CrudBasico" class="btn btn-danger">Salir</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
