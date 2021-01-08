<?php

namespace controllers;

use models\RecetaModel as RecetaModel;

require_once("../models/RecetaModel.php");

class getMaterialCristal{

    public function getMateriales(){
        session_start();
        if(isset($_SESSION['vendedor'])){
            $modelo = new RecetaModel();
            echo json_encode($modelo->getMaterialCristal());
        }else{
            echo json_encode(["msg" => "Acceso denegado"]);
        }
    }
}
$obj = new getMaterialCristal();
$obj->getMateriales();