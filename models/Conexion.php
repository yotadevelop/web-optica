<?php

namespace models;

class Conexion{

    public static $user ="u89dvleva685z4cm";
    public static $pass ="XEJRrghQodERY6QXwqR4";
    public static $URL  ="mysql:host=buop9ep6hmtpxuusf46z-mysql.services.clever-cloud.com;dbname=buop9ep6hmtpxuusf46z";

    public static function conector(){
        try{
            return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
        }catch(\PDOException $e){
            return null;
        }
    }
}