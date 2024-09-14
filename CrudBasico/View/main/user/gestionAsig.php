<?php include('../CrudBasico/View/Extra/header.php')?>

    <title>Gestión de Asignaciones</title>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h4>Panel de Control</h4> <!-- Título en la sidebar -->
            <ul class="nav flex-column">
                
                <li class="nav-item">
                        <i class="bi bi-people-fill">Bienvenido <?php echo $datos['nombre'].' '.$datos['apellidos'];?></i> 
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
                    <a href="../CrudBasico?typeControl=user&a=logout" class="btn btn-danger w-25 text-white text-decoration-none">Salir</a>
                </div>
            </div>
        </div>
    </div>
    <?php include('../CrudBasico/View/Extra/scripts.php')?>

</body>
</html>
