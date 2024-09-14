<?php 
include('../CrudBasico/App/Models/database/conexion.php');
include('../CrudBasico/App/Models/usersModel.php');
include('../CrudBasico/App/Models/employModel.php');
include('../CrudBasico/App/Models/asigModel.php');

    if(!isset($_GET['typeControl'])){
        include('../CrudBasico/App/Controller/loginController.php');
        $controller = new LoginController();
        call_user_func(array($controller, 'vistaLogin'));

    }else{
        $var=$_GET['typeControl'];
        include('../CrudBasico/App/Controller/'.$var.'Controller.php');
        $cName = ucwords($var).'Controller';
        $controller = new $cName;
        $actionController = isset($_GET['a']) ? $_GET['a'] : 'vista';
        call_user_func(array($controller, $actionController));
    }

