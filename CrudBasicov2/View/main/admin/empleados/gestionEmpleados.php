<?php include('../CrudBasico/View/Extra/header.php'); ?>
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
                                            echo '<a action="deleteEmpleado" tControl ="empleado" idElem= "'.$result['idEmpleado'].'" href="../CrudBasico?typeControl=empleado&a=deleteEmpleado&idEmpleado=&user='.$user.'" class="btn btn-danger btn-sm deleteBtn">Eliminar</a>';
                                            echo '<a href="../CrudBasico?typeControl=empleado&a=vistaUpdate&idEmpleado='.$result['idEmpleado'].'&user='.$user.'" class="btn btn-warning btn-sm">Modificar</a>';
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


    <?php include('../CrudBasico/View/Extra/scripts.php'); ?>

</body>
</html>
