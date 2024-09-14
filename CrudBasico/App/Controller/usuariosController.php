<?php
include('../CrudBasico/App/Controller/loginController.php');

class usuariosController{
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

//Tabla usuarios
    public function vistaUsers(){
        $datos = $this->sessionController->verify();
        if($datos['privilegios']== 'admin'){
            $arrayUsers = $this->usersModel->getAllUsers();
            include('../CrudBasico/View/main/admin/usuarios/gestionUsers.php');
        }else{
            $this->sessionController->logout();
        }

    }

    public function vistaModif(){
        $datos = $this->sessionController->verify();
        if($datos['privilegios']== 'admin'){
            $idUser = $_GET['idUser'];
            $usuario = $this->usersModel->getUserbyId($idUser);
            include('../CrudBasico/View/main/admin/usuarios/updateUser.php');
        }else{
            $this->sessionController->logout();
        }

    }
        public function modifUser(){
                if($_POST){
                        $idUser = $_POST['idUser'];
                        $nomUpd = $_POST['nombre'];
                        $lastUpd = $_POST['apellidos'];
                        $user = $_POST['usuario'];
                        $pass = $_POST['pass'];
                        $email = $_POST['correo'];
                        $status = $_POST['status'];
                        $privilege = $_POST['privilege'];

                        $response = [];
                    $existUserNoid = $this->usersModel->getOneUserNoId($user, $idUser);
                    $existUserbyEmailNoid = $this->usersModel->getOneUserbyEmailNoId($user, $idUser);
                        if(($existUserNoid) || ($existUserbyEmailNoid)){
                            $response =[
                                'status' => 'ERROR',
                                'alerta' => 'Modal_exist'
                            ];
                        }else{
                            $fechaUpd = $this->fecha();
                            $update = $this->usersModel->modifUser($idUser, $nomUpd, $lastUpd, $user, $pass, $email, $fechaUpd, $status, $privilege);
                            if($update){
                                $response =[
                                    'status' => 'Finalizado',
                                    'alerta' => 'Modal_Ok'
                                ];
                            }else{                                
                                $response =[
                                    'status' => 'ERROR',
                                    'alerta' => 'Modal_err'
                                ];
                            }

                            
                        } 
                        echo json_encode($response);
                }
        }



    public function deleteUser(){

            if($_POST){
                $response = [];
                $idUser = $_POST['idElem'];
                $user = $this->usersModel->getUserbyId($idUser);
                if($user){
                    $idEmpleado = $user['idEmpleado'];
                    $delEmp = $this->employModel->deleteEmpleado($idEmpleado);
                    $delUser = $this->usersModel->deleteUser($idUser);
                    if($delEmp && $delUser){
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
                }
                
                echo json_encode($response);
            }
        
    }

    public function vistaInsert(){
        $datos = $this->sessionController->verify();
        if($datos['privilegios']== 'admin'){
            include('../CrudBasico/View/main/admin/usuarios/insertUser.php');
        }else{
            $this->sessionController->logout();
        }

    }
    public function insertUser(){
        if($_POST){
            $name = $_POST['nameRegister'];
            $lastName = $_POST['lastNameRegister'];
            $user = $_POST['userRegister'];
            $email = $_POST['emailRegister'];
            $pass = $_POST['passRegister'];
            
            
            $existUser = $this->usersModel->getOneUser($user);
            $existUserbyEmail = $this->usersModel->getOneUserbyEmail($email);
            
            $response = [];
            if(($existUser) || ($existUserbyEmail)){
                $response = [
                    'status' => 'ERROR',
                    'alerta' => 'Modal_exist'
                ];
            }else{
                $star_date = $this->fecha();

                $newEmploy = $this->employModel->insertUser_empleado($name, $lastName, $star_date);
                

                if($newEmploy){
                    $lastId = $this->employModel->getLastId();
                    $newUser = $this->usersModel->insertUser($name, $lastName, $user, $pass, $email, $star_date, $lastId);
                    if($newUser){
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
                }else{
                    $response = [
                        'status' => 'ERROR',
                        'alerta' => 'Modal_err'
                    ];
                }
            }
            echo json_encode($response);
        
    }
        }

    

    public function fecha(){
        $fecha = new DateTime('now', new DateTimeZone('America/Lima'));
        return $fecha->format('Y-m-d H:i:s');
    }

}