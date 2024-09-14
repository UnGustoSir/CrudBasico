<?php

class employ{
    private $pdo;

    public function __construct()
    {
        $this->pdo = db::conexion();
    }

    public function getAllEmploy(){
        try{
            $consulta = $this->pdo->query('SELECT * FROM `empleados`');
            $empleados = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $empleados;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e;
        }
    }

    public function getAllEmploynoId($idEmpleado){
        try{
            $consulta = $this->pdo->query('SELECT * FROM `empleados` WHERE idEmpleado !='.$idEmpleado);
            $empleados = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $empleados;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e;
        }
    }
    public function getEmploybyId($idEmpleado){
        try{
            $consulta = $this->pdo->query('SELECT * FROM `empleados` WHERE idEmpleado ='.$idEmpleado);
            $empleado = $consulta ->fetch(PDO::FETCH_ASSOC);
            return $empleado;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e;
        }
        
    }

    public function getLastId(){
        try{
            $consulta = $this->pdo->lastInsertId();
            return $consulta;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e;
        }
    }

    public function modifEmpleado($idEmpleado, $name, $lastname, $dni, $puesto, $fechaActulizacion){
        try{
            $consulta = $this->pdo->query('UPDATE `empleados` SET nombre="'.$name.'", apellidos="'.$lastname.'", dni="'.$dni.'", puesto="'.$puesto.'", fechaCambio="'.$fechaActulizacion.'" WHERE idEmpleado='.$idEmpleado);
            return $consulta;
        }catch(PDOException $e){
            return false;
        }
        
    }

    public function deleteEmpleado($idEmpleado){
        try{
            $consulta = $this->pdo->query('DELETE FROM `empleados` WHERE idEmpleado ='.$idEmpleado);
            return $consulta;
        }catch(PDOException $e){
            return false;
        }
        
    }


    public function insertUser_Empleado($name, $lastname, $fechaStart){// NO MOVER
        try{
            $consulta = $this->pdo->query('INSERT INTO `empleados`  (`nombre`, `apellidos`,`fechaCreado`) VALUES ("'.$name.'", "'.$lastname.'", "'.$fechaStart.'")');
            return $consulta;
        }catch(PDOException $e){
            return false;
        }
    }

    
}