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
    
    public function vistaEmploy(){
        $arrayEmple = $this->employModel->getAllEmploy();
        if(isset($_GET['user'])){
            $user = $_GET['user'];
            $datosUser = $this->usersModel->getOneUser($user);
            include('../CrudBasico/View/main/admin/empleados/gestionEmpleados.php');

        }
    }

    public function deleteEmpleado(){
            if($_POST){
                $idEmpleado  = $_POST['idElem'];

                $response =[];
                $consulta = $this->employModel->deleteEmpleado($idEmpleado );
                if($consulta){
                    $response =[
                      'status' => 'Finalizado',
                      'alerta' => 'AlertOk'
                    ];
                }else{
                    $response =[
                        'status' => 'ERROR',
                        'alerta' => 'AlertErr'
                      ];
                }

                echo json_encode($response);
            }else{
                $response =[
                    'status' => 'No POST',
                    'alerta' => 'AlertErr'
                  ];    
                  echo json_encode($response);

            }
    }


    public function vistaUpdate(){
        if(isset($_GET['idEmpleado'])){
                    
            $idEmpleado  = $_GET['idEmpleado'];
            $empleado = $this->employModel->getEmploybyId($idEmpleado);
            $user = $_GET['user'];
            include('../CrudBasico/View/main/admin/empleados/updateEmpleados.php');
            
                
        
        }
    }

    public function modifEmpleado(){
            if($_POST){
                $AllEmploysArr = $this->employModel->getAllEmploy();
                $idEmpleado = $_POST['idEmpleado'];
                $nomUpd = $_POST['nom_form'];
                $lastUpd = $_POST['lastNom_form'];
                $dniUpd = $_POST['dni_form'];
                $puestoUpd = $_POST['puesto_form'];
                $response = [];

                $dniInvalid = false;
                foreach($AllEmploysArr as $resultado){
                    if($resultado['dni']==$dniUpd && $resultado['idEmpleado']!=$idEmpleado){
                        $dniInvalid = true;
                        break;
                    }
                }
                
                if($dniInvalid==false){
                    $fechaActulizacion = $this->fecha();
                    $consulta = $this->employModel->modifEmpleado($idEmpleado, $nomUpd, $lastUpd, $dniUpd, $puestoUpd, $fechaActulizacion);
                    
                    if($consulta){
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
                }else{
                    $response =[
                        'status' => 'ERROR',
                        'alerta' => 'Modal_exist'
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