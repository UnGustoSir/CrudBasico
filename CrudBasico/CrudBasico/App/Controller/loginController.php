<?php

class LoginController{
    private $usersModel;
    private $employModel;
    public function __construct()
    {
        $this->employModel = new employ();
        $this->usersModel = new users();
    }

    //Login
    public function vistaLogin(){

        include('../CrudBasico/View/login/login.php');
        if(!empty($_POST)){
            $this->verify();
        }
    }

    
    public function verify(){
        if(!empty($_POST['user'] && !empty($_POST['pass']))){
            $usuario = $_POST['user'];
            $pass = $_POST['pass'];
            $userExist=false;

        $Users = $this->usersModel->getAllUsers();
        foreach($Users as $User){
            if($User['usuario'] == $usuario && $User['pass'] == $pass){
                $userExist = true;

                if($User['privilege']=='user' && $User['status']=='Active'){

                    header('Location: ../CrudBasico?typeControl=user&a=vistaForUser&user='.$usuario);
                }elseif($User['privilege']=='admin' && $User['status']=='Active'){
                    
                    header('Location: ../CrudBasico?typeControl=empleado&user='.$usuario);
                }else{
                ?><script>Modal('ModalAcc_act')</script><?php
                    break;
                }
            }elseif(($User['usuario'] == $usuario && $User['pass'] != $pass)){
                ?><script>Modal('ModalLog_Inc')</script><?php
                $userExist = true;
                break;
            }
        }
    
            if(!$userExist){
                ?><script>Modal('ModalLog_NoExis')</script><?php
            }
        }else{
        ?><script>Modal('ModalLog_Com')</script><?php
        }
    }



    //Register
    public function vistaRegister(){
        include('../CrudBasico/View/login/newAccount.php');
        if(!empty($_POST)){ 
            $this->register();
        }
    }


    public function register(){
        if(!empty($_POST['nameRegister']) && !empty($_POST['lastNameRegister']) && !empty($_POST['userRegister']) && !empty($_POST['emailRegister']) && !empty($_POST['passRegister'])){
            $name = $_POST['nameRegister'];
            $lastName = $_POST['lastNameRegister'];
            $user = $_POST['userRegister'];
            $email = $_POST['emailRegister'];
            $pass = $_POST['passRegister'];
            
            
            $existUser = $this->usersModel->getOneUser($user);
            $existUserbyEmail = $this->usersModel->getOneUserbyEmail($email);
            
            if(($existUser) || ($existUserbyEmail)){
                ?><script>Modal('ModalAcc_ex')</script><?php

            }else{
                $star_date = $this->fecha();

                $newEmploy = $this->employModel->insertUser_empleado($name, $lastName, $star_date);
                

                if($newEmploy){
                    $lastId = $this->employModel->getLastId();
                    $newUser = $this->usersModel->insertUser($name, $lastName, $user, $pass, $email, $star_date, $lastId);
                    if($newUser){
                        ?><script>Modal('ModalAcc_ok')</script><?php
                    }else{
                        ?><script>Modal('ModalAcc_err')</script><?php
                    }
                }else{
                    ?><script>Modal('ModalAcc_err')</script><?php

                }
            }
        } else{
            ?><script>Modal('ModalAcc_va')</script><?php
        }
        
    }
    

    
    
    public function fecha(){
        $fecha = new DateTime('now', new DateTimeZone('America/Lima'));
        return $fecha->format('Y-m-d H:i:s');
    }
    
    
    }

