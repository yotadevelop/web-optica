<?php

namespace models;

class Conexion{

    public static $user ="ugd3vzhgoggpqvn2";
    public static $pass ="DYiUKbbW5n8n3nhN0l6E";
    public static $URL  ="mysql:host=brttyhx0tdhbgrmwhbm8-mysql.services.clever-cloud.com;dbname=brttyhx0tdhbgrmwhbm8";

    public static function conector(){
        try{
            return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
        }catch(\PDOException $e){
            return null;
        }
    }
}