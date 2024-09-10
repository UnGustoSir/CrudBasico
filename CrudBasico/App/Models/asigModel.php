<?php


class usuario {


    private $pdo;


    public function __construct()
    {
        $this->pdo = db::conexion();
    }


    //metodos para obtener o modificar los datos 
//Validaciones a la consulta pq el foreach saca error si no esta inicializada
    public function getAllAsig(){ //Ok
        try{
            $consulta = $this->pdo->query('SELECT * FROM `asignaciones`');
            $asig = $consulta->fetchAll(PDO::FETCH_ASSOC);
        
            return $asig;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e->getMessage();
        }
        
    }


    public function getAsigbyIdEmploy($idEmpleado){ //Ok
        try{
            $consulta = $this->pdo->query('SELECT * FROM `asignaciones` WHERE idEmpleado='.$idEmpleado);
            $asig = $consulta->fetchALL(PDO::FETCH_ASSOC);
        
            return $asig;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e->getMessage();
        }
        
    }



    public function getAsigbyId($idAsig){ //Ok
        try{
            $consulta = $this->pdo->query('SELECT * FROM `asignaciones` WHERE idAsig='.$idAsig);
            $asig = $consulta->fetch(PDO::FETCH_ASSOC);
        
            return $asig;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e->getMessage();
        }
        
    }


    public function getAsigbyIdArr($idEmpleado){ //Ok
        try{
            $consulta = $this->pdo->query('SELECT * FROM `asignaciones` WHERE idEmpleado='.$idEmpleado);
            $asig = $consulta->fetchAll(PDO::FETCH_ASSOC);
        
            return $asig;
        }catch(PDOException $e){
            echo 'Hubo un error en la consulta: '.$e->getMessage();
        }
        
    }

    public function deleteAsig($id){
        try{
            $consulta = $this->pdo->query('DELETE FROM `asignaciones` WHERE idAsig='.$id);
            return $consulta;
        }catch(PDOException $e){
            return false;
        }
        
    }


    public function insertAsig($name_asig, $desc_asig, $fechaCreación, $date_asig, $idEmpleado, $datosUser){ //Ok
        try{
            $sth = $this->pdo->prepare('INSERT INTO `asignaciones` (`asignacion`, `descripcion`, `fechaCreado`, `fechaEntrega`, `idEmpleado`, `empleadoAsignado`) VALUES (?,?,?,?,?,?)');
            $sth->execute(array($name_asig, $desc_asig, $fechaCreación, $date_asig, $idEmpleado, $datosUser));

            return $sth;
        }catch(PDOException $e){
            return false;
        }
        
    }



    public function modifAsig($id, $name_asig, $desc_asig, $date_asig ,$fDate_asig, $fechaUpd, $IduserAsig){
        try{
            $consulta = $this->pdo->query('UPDATE `asignaciones` SET asignacion="'.$name_asig.'",  descripcion="'.$desc_asig.'",  fechaCreado="'.$date_asig.'",  fechaEntrega="'.$fDate_asig.'",  idEmpleado="'.$IduserAsig.'",   fechaCambio="'.$fechaUpd.'" WHERE idAsig='.$id);
            return $consulta;
        }catch(PDOException $e){
            return false;
        }

    }
}