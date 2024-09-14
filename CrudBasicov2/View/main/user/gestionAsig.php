<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../CrudBasico/Public/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Gestión de Asignaciones</title>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h4>Panel de Control</h4> <!-- Título en la sidebar -->
            <ul class="nav flex-column">
                
                <li class="nav-item">
                        <i class="bi bi-people-fill">Bienvenido <?php echo $arrayUser['nombre'].' '.$arrayUser['apellidos'];?></i> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="bi bi-clipboard-data"></i> Gestionar asignaciones
                    </a>
                </li>

            </ul>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="text-center py-4">
                <h1 class="mb-4">Asignaciones</h1>

                <!-- Tabla de asignaciones -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Asignaciones</th>
                                <th>Descripción</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Actualización</th>
                                <th>Fecha de Entrega</th>
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
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Botón de salir -->
                <div class="mt-4">
                    <a href="../CrudBasico" class="btn btn-danger w-25 text-white text-decoration-none">Salir</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
