<?php

namespace controllers;

use models\RecetaModel as RecetaModel;

require_once("../models/RecetaModel.php");

class BuscarXRut
{
    public $rut;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
    }

    public function recetas()
    {
        session_start();
        if (isset($_SESSION['vendedor'])) {
            $modelo = new RecetaModel();
            $arr = $modelo->recetaXRut($this->rut);
            echo json_encode($arr);
        } else {
            echo json_encode(["msg" => "Acceso Denegado"]);
        }
    }
}

$obj = new BuscarXRut();
$obj->recetas();