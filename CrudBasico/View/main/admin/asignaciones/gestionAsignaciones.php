<?php include('../CrudBasico/View/Extra/header.php')?>

    <title>Gestionar Asignaciones</title>
</head>
<body>
    <div class="wrapper">
    <?php include('../CrudBasico/View/Extra/sidebard.php')?>
    <div id="mostrar"></div>


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
                                            <a action="deleteAsig" tControl="asig" idElem="'.$result['idAsig'].'"  class="btn btn-danger btn-sm deleteBtn">Eliminar</a>
                                            <a href="../CrudBasico?typeControl=asig&a=vistaUpdate&idAsig='.$result['idAsig'].'" class="btn btn-warning btn-sm">Modificar</a>
                                        </td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Botones para acciones -->
                <div class="mt-4">
                    <a href="../CrudBasico?typeControl=asig&a=vistaInsert" class="btn btn-success">Insertar Asignación</a>
                    <a href="../CrudBasico?typeControl=asig&a=logout" class="btn btn-danger">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <?php include('../CrudBasico/View/Extra/scripts.php')?>

</body>
</html>
