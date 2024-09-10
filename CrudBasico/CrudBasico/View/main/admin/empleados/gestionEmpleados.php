<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../CrudBasico/Public/css/style.css" rel="stylesheet">
    <script src="../CrudBasico/Public/JS/Modal.js"></script>
    <title>Gestión de Empleados</title>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include('../CrudBasico/View/Extra/sidebard.php')?>


        <!-- Main Content -->
        <div class="content">
            <div class="text-center py-4">
                <h1 class="mb-4">Empleados</h1>

                <!-- Alertas de error -->
                <div class="alert alert-danger" role="alert" id="MDelUser_err" hidden>Error al borrar usuario</div>

                <!-- Tabla de empleados -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>DNI</th>
                                <th>Puesto</th>
                                <th>Fecha Inicio</th>
                                <th>Última Actualización</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($arrayEmple as $result){
                                    echo '<tr>';
                                        echo '<td>'.$result['idEmpleado'].'</td>';
                                        echo '<td>'.$result['nombre'].'</td>';
                                        echo '<td>'.$result['apellidos'].'</td>';
                                        echo '<td>'.$result['dni'].'</td>';
                                        echo '<td>'.$result['puesto'].'</td>';
                                        echo '<td>'.$result['fechaCreado'].'</td>';
                                        echo '<td>'.$result['fechaCambio'].'</td>';
                                        echo '<td class="d-flex justify-content-center gap-2">';
                                            echo '<a href="../CrudBasico?typeControl=empleado&a=deleteEmpleado&idEmpleado='.$result['idEmpleado'].'&user='.$user.'" class="btn btn-danger btn-sm">Eliminar</a>';
                                            echo '<a href="../CrudBasico?typeControl=empleado&a=modifEmpleado&idEmpleado='.$result['idEmpleado'].'&user='.$user.'" class="btn btn-warning btn-sm">Modificar</a>';
                                        echo '</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Botón de salir -->
                <a href="../CrudBasico" class="btn btn-danger w-25 text-white text-decoration-none">Salir</a>
            </div>
        </div>
    </div>
</body>
</html>
