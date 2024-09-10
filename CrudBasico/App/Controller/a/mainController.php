<?php
include('../CrudBasico/App/Controller/loginController.php');

class mainController{
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
    
        
    //Tabla empleados
    
    public function vista(){
        $arrayEmple = $this->employModel->getAllEmploy();
        if(isset($_GET['user'])){
            $user = $_GET['user'];
            $datosUser = $this->usersModel->getOneUser($user);
            include('../CrudBasico/View/main/admin/empleados/gestionEmpleados.php');

        }
    }

    public function deleteEmpleado(){
            if(isset($_GET['idEmpleado'])){
                $idEmpleado  = $_GET['idEmpleado'];
                $consulta = $this->employModel->deleteEmpleado($idEmpleado );
                if($consulta){
                    header('Location: ../CrudBasico?typeControl=main');
                }else{
                    ?><script>Modal('MDelUser_err')</script><?php
                    $_GET['ok']=false;

                }
            }
    }

    public function modifEmpleado(){
            
            if(isset($_GET['idEmpleado'])){
                
                $idEmpleado  = $_GET['idEmpleado'];
                $empleado = $this->employModel->getEmploybyId($idEmpleado);

                include('../CrudBasico/View/main/admin/empleados/updateEmpleados.php');
            }

            if($_POST && isset($_POST)){
                $AllEmploysArr = $this->employModel->getAllEmploy();
                $idEmpleado = $_GET['idEmpleado'];
                $nomUpd = $_POST['nom_form'];
                $lastUpd = $_POST['lastNom_form'];
                $dniUpd = $_POST['dni_form'];
                $puestoUpd = $_POST['puesto_form'];

                $dniInvalid = false;
                foreach($AllEmploysArr as $resultado){
                    if($resultado['dni']==$dniUpd && $resultado['idEmpleado']!=$idEmpleado){
                        $dniInvalid = true;
                        break;
                    }
                }
                
                if($dniInvalid==false){
                    $fechaActulizacion = $this->fecha();
                    $this->employModel->modifEmpleado($idEmpleado, $nomUpd, $lastUpd, $dniUpd, $puestoUpd, $fechaActulizacion);
                    ?><script>Modal('MUpdEmploy_ok');
                        setTimeout(function() {
                    window.location.href = '../CrudBasico?typeControl=main&a=modifEmpleado&idEmpleado=<?php echo $idEmpleado; ?>';
                }, 2000);
                
                </script><?php

                }else{

                    ?><script>Modal('MUpdEmploy_dni')
                    </script><?php
                }

            }
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
                                window.location.href = '../CrudBasico?typeControl=main&a=modifUser&idUser=<?php echo $idUser; ?>';
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
                $idUser = $_GET['idUser'];
                $user = $this->usersModel->getUserbyId($idUser);
                if($user){
                    $idEmpleado = $user['idEmpleado'];
                    $this->employModel->deleteEmpleado($idEmpleado);
                    $this->usersModel->deleteUser($idUser);
                }
                
                header('Location: ../CrudBasico?typeControl=main&a=vistaUsers');
            }
        
    }

    public function insertUser(){
        include('../CrudBasico/View/main/admin/usuarios/insertUser.php');

        if($_POST && isset($_POST)){
            $this->loginController->register();
        }

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
            $consulta = $this->asigModel->deleteAsig($idAsig);
            if($consulta){
                header('Location: ../CrudBasico?typeControl=main&a=vistaAsig');
            }else{
            }
        }
    }

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
                    window.location.href = '../CrudBasico?typeControl=main&a=vistaAsig';
                    }, 2000);
                </script><?php
            }else{
                ?><script>Modal('ModalAsig_err')</script><?php

            }

        }
        
    }

    public function modifAsig(){
        if(isset($_GET['idAsig'])){
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
                      window.location.href = '../CrudBasico?typeControl=main&a=vistaAsig';
                      }, 2000);
                    </script><?php

                }else{
                    ?><script>Modal('ModalAcc_err')</script><?php

                }      
            }}
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