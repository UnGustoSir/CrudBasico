<?php
include('../CrudBasico/App/Controller/loginController.php');

class usuariosController{
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
    
//Tabla usuarios
    public function vistaUsers(){
        $arrayUsers = $this->usersModel->getAllUsers();
        if(isset($_GET['user'])){
            $user = $_GET['user'];
            $datosUser = $this->usersModel->getOneUser($user);
            include('../CrudBasico/View/main/admin/usuarios/gestionUsers.php');

        }
    }

        public function modifUser(){
                if(isset($_GET['idUser'])){
                    $Globaluser = $_GET['user'];
                    $idUser = $_GET['idUser'];
                    $usuario = $this->usersModel->getUserbyId($idUser);
                    include('../CrudBasico/View/main/admin/usuarios/updateUser.php');

                }

                if($_POST && isset($_POST)){
                    if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['correo'])){
                        $idUser = $_GET['idUser'];
                        $nomUpd = $_POST['nombre'];
                        $lastUpd = $_POST['apellidos'];
                        $user = $_POST['usuario'];
                        $pass = $_POST['pass'];
                        $email = $_POST['correo'];
                        $status = $_POST['status'];
                        $privilege = $_POST['privilege'];

                    $existUserNoid = $this->usersModel->getOneUserNoId($user, $idUser);
                    $existUserbyEmailNoid = $this->usersModel->getOneUserbyEmailNoId($user, $idUser);
                        if(($existUserNoid) || ($existUserbyEmailNoid)){
                            ?><script>Modal('ModalAcc_ex')</script><?php
                        }else{
                            $fechaUpd = $this->fecha();
                            $update = $this->usersModel->modifUser($idUser, $nomUpd, $lastUpd, $user, $pass, $email, $fechaUpd, $status, $privilege);
                            if($update){
                                ?><script>Modal('ModalAcc_ok')
                                setTimeout(function() {
                                window.location.href = '../CrudBasico?typeControl=usuarios&a=modifUser&idUser=<?php echo $idUser; ?>&user=<?php echo $Globaluser?>';
                                }, 2000);
                                </script><?php
                            }else{                                
                                ?><script>Modal('ModalAcc_err')</script><?php
                            }
                        } 
                    }else{
                        ?><script>Modal('MUpdUser_rell')</script><?php    
                    }
                }
        }



    public function deleteUser(){
            if(isset($_GET['idUser'])){
                //Faltan validaciones para saber si se a borrado
                $Globaluser = $_GET['user'];

                $idUser = $_GET['idUser'];
                $user = $this->usersModel->getUserbyId($idUser);
                if($user){
                    $idEmpleado = $user['idEmpleado'];
                    $this->employModel->deleteEmpleado($idEmpleado);
                    $this->usersModel->deleteUser($idUser);
                }
                
                header('Location: ../CrudBasico?typeControl=usuarios&a=vistaUsers&user='.$Globaluser.'');
            }
        
    }

    public function insertUser(){
        $Globaluser = $_GET['user'];

        include('../CrudBasico/View/main/admin/usuarios/insertUser.php');

        if($_POST && isset($_POST)){

            $this->loginController->register();
        }

    }

    public function fecha(){
        $fecha = new DateTime('now', new DateTimeZone('America/Lima'));
        return $fecha->format('Y-m-d H:i:s');
    }

}