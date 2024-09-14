<?php

class db {
    const host = 'localhost';
    const user = 'root';
    const pass = '';
    const db = 'crud1';    

    public static function conexion(){
    try {
        $conexion = new PDO('mysql:host=' .self::host. ';dbname=' . self::db.';charset=utf8', self::user, self::pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

}
}

