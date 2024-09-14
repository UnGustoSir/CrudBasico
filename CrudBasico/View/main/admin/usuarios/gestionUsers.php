<?php include('../CrudBasico/View/Extra/header.php')?>

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
                                            echo '<a idElem="'.$result['idUser'].'" tControl="usuarios" action="deleteUser" class="btn btn-danger btn-sm deleteBtn">Eliminar</a>';
                                            echo '<a href="../CrudBasico?typeControl=usuarios&a=vistaModif&idUser='.$result['idUser'].'" class="btn btn-warning btn-sm">Modificar</a>';
                                        echo '</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Botones de acción -->
                <div class="mt-4">
                    <a href="../CrudBasico?typeControl=usuarios&a=vistaInsert" class="btn btn-success">Insertar Usuario</a>
                    <a href="../CrudBasico?typeControl=usuarios&a=logout" class="btn btn-danger">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <?php include('../CrudBasico/View/Extra/scripts.php')?>

</body>
</html>
