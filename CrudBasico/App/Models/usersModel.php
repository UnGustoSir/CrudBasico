<?php


class users {


    private $pdo;


    public function __construct()
    {
        $this->pdo = db::conexion();
    }


    public function getAllUsers(){// NO MOVER
        try{
            $consulta = $this->pdo->query('SELECT * FROM `users`');
            $users = $consulta->fetchAll(PDO::FETCH_ASSOC);
        
            return $users;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e->getMessage();
        }
        
    }

    public function getAllUsersnoIdEmp($id){
        try{
            $consulta = $this->pdo->query('SELECT * FROM `users` WHERE idEmpleado!='.$id);
            $empleados = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $empleados;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e;
        }
    }
    public function getOneUser($user){// NO MOVER
        try{
            $consulta = $this->pdo->query('SELECT * FROM `users` WHERE usuario="'.$user.'"');
            $user = $consulta->fetch(PDO::FETCH_ASSOC);
            return $user;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e->getMessage();
        }

    }

    public function getUserbyId($idUser){
        try{
            $consulta =$this->pdo->query('SELECT * FROM `users` WHERE idUser='.$idUser);
            $user = $consulta->fetch(PDO::FETCH_ASSOC);
            return $user;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e->getMessage();

        }
    }

    public function getUserbyIdEmpleado($id){
        try{
            $consulta =$this->pdo->query('SELECT * FROM `users` WHERE idEmpleado='.$id);
            $user = $consulta->fetch(PDO::FETCH_ASSOC);
            return $user;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e->getMessage();

        }
    }
    public function getOneUserbyEmail($email){// NO MOVER
        try{
            $consulta = $this->pdo->query('SELECT * FROM `users` WHERE correo="'.$email.'"');
            $user = $consulta->fetch(PDO::FETCH_ASSOC);
            return $user;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e->getMessage();
        }

    }


    public function getOneUserNoId($user, $idUser){
        try{
            $consulta = $this->pdo->query('SELECT * FROM `users` WHERE usuario="'.$user.'" AND idUser!='.$idUser);
            $user = $consulta->fetch(PDO::FETCH_ASSOC);
            return $user;
        }catch(PDOException $e){
            return false;
        }

    }

    public function getOneUserbyEmailNoId($email, $idUser){
        try{
            $consulta = $this->pdo->query('SELECT * FROM `users` WHERE correo="'.$email.'" AND idUser!='.$idUser);
            $user = $consulta->fetch(PDO::FETCH_ASSOC);
            return $user;
        }catch(PDOException $e){
            return false;
        }

    }


    public function insertUser($name, $lastname, $user, $pass, $email, $start_date, $lastId){// NO MOVER
        try{
            $consulta = $this->pdo->query('INSERT INTO `users` (`nombre`,`apellidos` ,`usuario`, `pass`, `correo`, `fechaCreado`, `idEmpleado`) values ("'.$name.'", "'.$lastname.'", "'.$user.'", "'.$pass.'", "'.$email.'", "'.$start_date.'" , "'.$lastId.'")');
            return $consulta;
        }catch(PDOException $e){
            //echo 'Hubo un error en la consulta: '.$e->getMessage();
            return false; 
        }

    }

    public function modifUser($idUser, $nomUpd, $lastUpd, $user, $pass, $email, $fechaUpd,  $status, $privilege){
        try{
            $consulta = $this->pdo->query('UPDATE `users` SET nombre="'.$nomUpd.'",  apellidos="'.$lastUpd.'",  usuario="'.$user.'",  pass="'.$pass.'",  correo="'.$email.'",   fechaCambio="'.$fechaUpd.'",   status="'.$status.'" ,   privilege="'.$privilege.'" WHERE idUser='.$idUser);
            return $consulta;
        }catch(PDOException $e){
            return false;
        }

    }

    
    public function deleteUser($id){
        try{
            $consulta = $this->pdo->query('DELETE FROM `users` WHERE idUser='.$id);
            return $consulta;
        }catch(PDOException $e){
            return false;
        }

    }
}