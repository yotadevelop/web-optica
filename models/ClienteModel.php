<?php

namespace models;

require_once("Conexion.php");

class ClienteModel{

    public function findClienteRut($rut){
        $stm = Conexion::conector()->prepare("SELECT * FROM cliente WHERE rut_cliente=:A");
        $stm->bindParam(":A", $rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insert_Client($data){
        $stm = Conexion::conector()->prepare("INSERT INTO cliente VALUES(:A,:B,:C,:D,:E,:F)");
        $stm->bindParam(":A",$data['rut']);
        $stm->bindParam(":B",$data['nombre']);
        $stm->bindParam(":C",$data['direccion']);
        $stm->bindParam(":D",$data ['telefono']);
        $stm->bindParam(":E",$data['fecha']);
        $stm->bindParam(":F",$data['email']);
        return $stm->execute();
    }

}