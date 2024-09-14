<div class="sidebar">
            <h4>Panel de Control</h4> <!-- Título en la sidebar -->
            <ul class="nav flex-column">
                <li class="nav-item">
                        <i class="bi bi-people-fill">Bienvenido <?php echo $datos['nombre'].' '.$datos['apellidos'];?></i> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../CrudBasico?typeControl=empleado&a=vistaEmploy">
                        <i class="bi bi-people-fill">Gestionar empleados</i> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../CrudBasico?typeControl=usuarios&a=vistaUsers">
                        <i class="bi bi-person-circle">Gestionar usuarios</i> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../CrudBasico?typeControl=asig&a=vistaAsig">
                        <i class="bi bi-clipboard-data">Gestionar asignaciones</i> 
                    </a>
                </li>
                <div class="nav-separator"></div> <!-- Separador -->
                <!-- Otros enlaces adicionales -->
            </ul>
        </div>