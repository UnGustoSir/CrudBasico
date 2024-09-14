<?php
include('../CrudBasico/App/Controller/loginController.php');

class asigController{
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


    
    public function vistaAsig(){
        $arrayAsig = $this->asigModel->getAllAsig();
        if(isset($_GET['user'])){
            $user = $_GET['user'];
            $datosUser = $this->usersModel->getOneUser($user);
            include('../CrudBasico/View/main/admin/asignaciones/gestionAsignaciones.php');
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
                    'alerta' => 'Asig_Ok'
                ];
            }else{
                $response = [
                    'status' => 'ERROR',
                    'alerta' => 'Asig_err'

                ];
            }

            echo json_encode($response);
        }
    }


    public function vistaInsert(){
        $arrayUser = $this->usersModel->getAllUsers();
        $Globaluser = $_GET['user'];

        include('../CrudBasico/View/main/admin/asignaciones/Insert.php');

    }

    
    public function vistaUpdate(){
        if(isset($_GET['idAsig'])){
            $user = $_GET['user'];
            $idAsig = $_GET['idAsig'];
            $asignacion = $this->asigModel->getAsigbyId($idAsig);
            $usuario = $this->usersModel->getUserbyIdEmpleado($asignacion['idEmpleado']);
            $OtherUsers = $this->usersModel->getAllUsersnoIdEmp($asignacion['idEmpleado']);
            include('../CrudBasico/View/main/admin/asignaciones/Update.php');
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
                        'alerta' => 'Asig_Ok'

                    ];
                }else{
                    $response = [
                        'status' => 'ERROR',
                        'alerta' => 'Asig_err'

                    ];
                }      

                echo json_encode($response);
       }
                
           
}

public function fecha(){
    $fecha = new DateTime('now', new DateTimeZone('America/Lima'));
    return $fecha->format('Y-m-d H:i:s');
}




/*
    public function insertAsig(){



        
        $arrayUser = $this->usersModel->getAllUsers();
        include('../CrudBasico/View/main/admin/asignaciones/insertAsig.php');
        
        if(!empty($_POST['name_asig']) && !empty($_POST['desc_asig']) && !empty($_POST['date_asig']) && !empty($_POST['userAsig']) ){

            $name_asig = $_POST['name_asig'];
            $desc_asig = $_POST['desc_asig'];
            $date_asig = $_POST['date_asig'];
            $userAsig = $_POST['userAsig'];

            $User = $this->usersModel->getOneUser($userAsig);

            $idEmpleado = $User['idEmpleado'];
            $datosUser = $User['nombre'].' '.$User['apellidos'];
            $fechaCreacion = $this->fecha();

            $consulta = $this->asigModel->insertAsig($name_asig, $desc_asig, $fechaCreacion, $date_asig, $idEmpleado, $datosUser);
            if($consulta){
                ?><script>Modal('ModalAsig_ok');
                setTimeout(function() {
                    window.location.href = '../CrudBasico?typeControl=asig&a=vistaAsig&user=<?php echo $Globaluser ?>';
                    }, 2000);
                </script><?php
            }else{
                ?><script>Modal('ModalAsig_err')</script><?php

            }

        }
        
    }
        */

}