<?php

namespace models;

require_once("Conexion.php");

class UsuarioModel{

    public function userAllVendor(){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rol='vendedor'");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findUsers($rut){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A");
        $stm->bindParam(":A", $rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insert_User($data){
        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:A,:B,:C,:D,:E)");
        $stm->bindParam(":A",$data['rut']);
        $stm->bindParam(":B",$data['nombre']);
        $stm->bindParam(":C",$data['rol']);
        $stm->bindParam(":D",md5($data['clave']));
        $stm->bindParam(":E",$data['estado']);
        return $stm->execute();
    }

    public function editar($data){
        $stm = Conexion::conector()->prepare("UPDATE usuario SET estado=:A, WHERE rut=:B");
        $stm->bindParam(":A", $data['estado']);
        $stm->bindParam(":B", $data['rut']);
        return $stm->execute();
    }
    

    public function logUser($rut, $clave){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A AND clave=:B AND rol='administrador'");
        $stm->bindParam(":A",$rut);
        $stm->bindParam(":B",md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function logUserVend($rut, $clave){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A AND clave=:B AND rol='vendedor' AND estado=1");
        $stm->bindParam(":A",$rut);
        $stm->bindParam(":B",md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }   
}