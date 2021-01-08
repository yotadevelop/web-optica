<?php

namespace controllers;

use models\ClienteModel as ClienteModel;

require_once("../models/ClienteModel.php");

class FindCliente{
    public $rut;

    public function __construct(){
        $this->rut = $_POST["rut"];
    }

    public function buscarCliente(){
        session_start();
        if(isset($_SESSION['vendedor'])){
            $modelo = new ClienteModel();
            $arr = $modelo->findClienteRut($this->rut);
            if(count($arr)==1){
                echo json_encode($arr[0]);
            }else{
                echo json_encode(null);
            }
        }else{
            echo json_encode(['msg' => 'acceso denegado']);
        }     
    }
}
$obj = new FindCliente();
$obj->buscarCliente();