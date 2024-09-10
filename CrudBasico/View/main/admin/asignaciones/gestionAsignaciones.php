<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../CrudBasico/Public/css/style.css" rel="stylesheet">

    <title>Gestionar Asignaciones</title>
</head>
<body>
    <div class="wrapper">
    <?php include('../CrudBasico/View/Extra/sidebard.php')?>



        <!-- Main Content -->
        <div class="content">
            <div class="text-center py-4">
                <h1 class="mb-4">Asignaciones</h1>

                <!-- Tabla para las asignaciones -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Id Asignación</th>
                                <th>Asignación</th>
                                <th>Descripción</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Actualización</th>
                                <th>Fecha de Entrega</th>
                                <th>Empleado Asignado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($arrayAsig as $result){
                                    echo '<tr>';
                                        echo '<td>'.$result['idAsig'].'</td>';
                                        echo '<td>'.$result['asignacion'].'</td>';
                                        echo '<td>'.$result['descripcion'].'</td>';
                                        echo '<td>'.$result['fechaCreado'].'</td>';
                                        echo '<td>'.$result['fechaCambio'].'</td>';
                                        echo '<td>'.$result['fechaEntrega'].'</td>';
                                        echo '<td>'.$result['empleadoAsignado'].'</td>';

                                        echo '<td class="d-flex justify-content-center gap-2">
                                            <a href="../CrudBasico?typeControl=asig&a=deleteAsig&idAsig='.$result['idAsig'].'&user='.$user.'" class="btn btn-danger btn-sm">Eliminar</a>
                                            <a href="../CrudBasico?typeControl=asig&a=modifAsig&idAsig='.$result['idAsig'].'&user='.$user.'" class="btn btn-warning btn-sm">Modificar</a>
                                        </td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Botones para acciones -->
                <div class="mt-4">
                    <a href="../CrudBasico?typeControl=asig&a=insertAsig&user=<?php echo $user?>" class="btn btn-success">Insertar Asignación</a>
                    <a href="../CrudBasico" class="btn btn-danger">Salir</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
