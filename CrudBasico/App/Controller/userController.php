
<?php
include('../CrudBasico/App/Controller/loginController.php');

class userController{
    private $employModel;
    private $usersModel;
    private $loginController;
    private $asigModel;
    private $sessionController;

    public function __construct(){
        $this->employModel = new employ();
        $this->usersModel = new users();
        $this->loginController = new LoginController();
        $this->asigModel = new usuario();
        $this->sessionController = new sessionController();

    }
    
    public function logout(){
        $this->sessionController->logout();
    }
//Vista para usuarios no admin
    public function vistaForUser(){
        $datos = $this->sessionController->verify();

                $arrayAsig= $this->asigModel->getAsigbyIdArr($datos['idEmpleado']);
                include('../CrudBasico/View/main/user/gestionAsig.php');
    }

    public function fecha(){
        $fecha = new DateTime('now', new DateTimeZone('America/Lima'));
        return $fecha->format('Y-m-d H:i:s');
    }
}