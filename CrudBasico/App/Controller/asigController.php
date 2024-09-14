<?php
include('../CrudBasico/App/Controller/loginController.php');

class asigController{
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

    
    public function vistaAsig(){
        $datos = $this->sessionController->verify();

        if($datos['privilegios']== 'admin'){
            $arrayAsig = $this->asigModel->getAllAsig();
            include('../CrudBasico/View/main/admin/asignaciones/gestionAsignaciones.php');
        }else{
            $this->sessionController->logout();
        }
    }


    public function deleteAsig(){

        if($_POST){
            $idAsig = $_POST['idElem'];

            $consulta = $this->asigModel->deleteAsig($idAsig);

            $response = [];

            if($consulta){
                $response = [
                    'status' => 'Finalizado',
                    'alerta' => 'AlertOk'

                ];
            }else{
                $response = [
                    'status' => 'ERROR',
                    'alerta' => 'AlertErr'

                ];
            }

            echo json_encode($response);
        }else{
            $response = [
                'status' => 'No POST',
                'alerta' => 'AlertErr'

            ];
            echo json_encode($response);

        }
    }

    public function insertAsig(){

        if($_POST){
            $name_asig = $_POST['name_asig'];
            $desc_asig = $_POST['desc_asig'];
            $date_asig = $_POST['date_asig'];
            $userAsig = $_POST['userAsig'];
            $fechaCreacion = $this->fecha();

            $User = $this->usersModel->getOneUser($userAsig);

            $response =[];


            $idEmpleado = $User['idEmpleado'];
            $datosUser = $User['nombre'].' '.$User['apellidos'];
            $consulta = $this->asigModel->insertAsig($name_asig, $desc_asig, $fechaCreacion, $date_asig, $idEmpleado, $datosUser);

            if($consulta){
                $response = [
                    'status' => 'Finalizado',
                    'alerta' => 'Modal_Ok'
                ];
            }else{
                $response = [
                    'status' => 'ERROR',
                    'alerta' => 'Modal_err'

                ];
            }

            echo json_encode($response);
        }
    }


    public function vistaInsert(){
        $datos = $this->sessionController->verify();

        if($datos['privilegios']== 'admin'){
            $arrayUser = $this->usersModel->getAllUsers();
            $Globaluser = $_GET['user'];
    
            include('../CrudBasico/View/main/admin/asignaciones/Insert.php');
        }else{
            $this->sessionController->logout();
        }


    }

    
    public function vistaUpdate(){
        $datos = $this->sessionController->verify();

        if($datos['privilegios']== 'admin'){
            $idAsig = $_GET['idAsig'];
            $asignacion = $this->asigModel->getAsigbyId($idAsig);
            $usuario = $this->usersModel->getUserbyIdEmpleado($asignacion['idEmpleado']);
            $OtherUsers = $this->usersModel->getAllUsersnoIdEmp($asignacion['idEmpleado']);
            include('../CrudBasico/View/main/admin/asignaciones/Update.php');
        }else{
            $this->sessionController->logout();
        }

        
    }

    public function modifAsig(){
        
       if($_POST){

                $idAsig = $_POST['idAsig'];
                $name_asig = $_POST['name_asig'];
                $desc_asig = $_POST['desc_asig'];
                $date_asig = $_POST['date_asig'];
                $fDate_asig = $_POST['fDate_asig'];
                $IdUserAsig = $_POST['userAsig'];
                
                $response =[];

                $fechaUpd = $this->fecha();

                $consulta = $this->asigModel->modifAsig($idAsig, $name_asig, $desc_asig, $date_asig ,$fDate_asig, $fechaUpd, $IdUserAsig);  
                if($consulta){
                    $response =[
                        'status' => 'Finalizado',
                        'alerta' => 'Modal_Ok'

                    ];
                }else{
                    $response = [
                        'status' => 'ERROR',
                        'alerta' => 'Modal_err'

                    ];
                }      

                echo json_encode($response);
       }
                
           
}

public function fecha(){
    $fecha = new DateTime('now', new DateTimeZone('America/Lima'));
    return $fecha->format('Y-m-d H:i:s');
}





}