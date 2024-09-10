
<?php
include('../CrudBasico/App/Controller/loginController.php');

class userController{
    private $employModel;
    private $usersModel;
    private $loginController;
    private $asigModel;
    public function __construct(){
        $this->employModel = new employ();
        $this->usersModel = new users();
        $this->loginController = new LoginController();
        $this->asigModel = new usuario();
    }
    

//Vista para usuarios no admin
    public function vistaForUser(){
        if(isset($_GET['user'])){

            $user = $_GET['user'];
            $arrayUser = $this->usersModel->getOneUser($user);
            if($arrayUser){
                $idEmpleado = $arrayUser['idEmpleado'];
                $arrayAsig= $this->asigModel->getAsigbyIdArr($idEmpleado);
                include('../CrudBasico/View/main/user/gestionAsig.php');
            }
            

        }
        
    }
    
   




    public function fecha(){
        $fecha = new DateTime('now', new DateTimeZone('America/Lima'));
        return $fecha->format('Y-m-d H:i:s');
    }





}