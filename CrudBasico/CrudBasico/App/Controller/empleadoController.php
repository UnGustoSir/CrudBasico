<?php
include('../CrudBasico/App/Controller/loginController.php');

class empleadoController{
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
                $user = $_GET['user'];

                $consulta = $this->employModel->deleteEmpleado($idEmpleado );
                if($consulta){
                    header('Location: ../CrudBasico?typeControl=empleado&user='.$user);
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
                $user = $_GET['user'];
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
                    window.location.href = '../CrudBasico?typeControl=empleado&a=modifEmpleado&idEmpleado=<?php echo $idEmpleado;?>&user=<?php echo $user?>';
                }, 2000);
                
                </script><?php

                }else{

                    ?><script>Modal('MUpdEmploy_dni')
                    </script><?php
                }

            }
    }


    public function fecha(){
        $fecha = new DateTime('now', new DateTimeZone('America/Lima'));
        return $fecha->format('Y-m-d H:i:s');
    }


}