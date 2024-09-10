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
        if(isset($_GET['idAsig'])){
            $idAsig = $_GET['idAsig'];
            $user = $_GET['user'];

            $consulta = $this->asigModel->deleteAsig($idAsig);
            if($consulta){
                header('Location: ../CrudBasico?typeControl=asig&a=vistaAsig&user='.$user);
            }else{
            }
        }
    }

    public function insertAsig(){
        $Globaluser = $_GET['user'];

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

    public function modifAsig(){
        if(isset($_GET['idAsig'])){
            $user = $_GET['user'];
            $idAsig = $_GET['idAsig'];
            $asignacion = $this->asigModel->getAsigbyId($idAsig);
            $usuario = $this->usersModel->getUserbyIdEmpleado($asignacion['idEmpleado']);
            $OtherUsers = $this->usersModel->getAllUsersnoIdEmp($asignacion['idEmpleado']);
            include('../CrudBasico/View/main/admin/asignaciones/updateAsig.php');
        }

        if(isset($_POST['idAsig'])){
            if(!empty($_POST['name_asig']) && !empty($_POST['desc_asig']) && !empty($_POST['date_asig']) && !empty($_POST['fDate_asig']) && !empty($_POST['userAsig'])){
                $idAsig = $_POST['idAsig'];
                $name_asig = $_POST['name_asig'];
                $desc_asig = $_POST['desc_asig'];
                $date_asig = $_POST['date_asig'];
                $fDate_asig = $_POST['fDate_asig'];
                $IdUserAsig = $_POST['userAsig'];
                
                $fechaUpd = $this->fecha();

                $consulta = $this->asigModel->modifAsig($idAsig, $name_asig, $desc_asig, $date_asig ,$fDate_asig, $fechaUpd, $IdUserAsig);  
                if($consulta){
                    ?><script>Modal('ModalAcc_ok');
                      setTimeout(function() {
                      window.location.href = '../CrudBasico?typeControl=asig&a=vistaAsig&user=<?php echo $user?>';
                      }, 2000);
                    </script><?php

                }else{
                    ?><script>Modal('ModalAcc_err')</script><?php

                }      
            }}
}

public function fecha(){
    $fecha = new DateTime('now', new DateTimeZone('America/Lima'));
    return $fecha->format('Y-m-d H:i:s');
}



}