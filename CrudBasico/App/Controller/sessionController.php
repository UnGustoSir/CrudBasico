<?php
class sessionController{
    private $employModel;
    private $usersModel;
    private $asigModel;


    public function __construct(){
        $this->employModel = new employ();
        $this->usersModel = new users();
        $this->asigModel = new usuario();
    }


    public function verify(){
            if($_SESSION['user'] && $_SESSION['privilege'] == 'admin'){ 
                $datosUser = $this->usersModel->getOneUser($_SESSION['user']);
                $datos= [
                    'usuario'=> $_SESSION['user'],
                    'privilegios' => 'admin',
                    'nombre' => $datosUser['nombre'],
                    'apellidos' => $datosUser['apellidos']
                ];

                return $datos;

            }else if($_SESSION['user'] && $_SESSION['privilege']== 'user'){
                $datosUser = $this->usersModel->getOneUser($_SESSION['user']);
                $datos= [
                    'usuario'=> $_SESSION['user'],
                    'privilegios' => 'user',
                    'nombre' => $datosUser['nombre'],
                    'apellidos' => $datosUser['apellidos'],
                    'idEmpleado' => $datosUser['idEmpleado']
                ];
                print_r($datos);
                return $datos;

            }else{
                header('Location: ../CrudBasico');
            }
        }
        
    

    public function logout(){
        $_SESSION = [];
        session_destroy();
        header('Location: ../CrudBasico');
    }
}



