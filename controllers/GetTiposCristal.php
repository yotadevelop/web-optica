<?php

namespace controlllers;

use models\RecetaModel as RecetaModel;

require_once("../models/RecetaModel.php");

class getTiposCristal{

    public function getTipos(){
        session_start();
        if(isset($_SESSION['vendedor'])){
            $modelo = new RecetaModel();
            echo json_encode($modelo->getTiposCristal());
        }else{
            echo json_encode(["msg" => "Acceso denegado"]);
        }
    }
}
$obj = new getTiposCristal();
$obj->getTipos();