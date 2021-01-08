<?php 

namespace controllers;

require_once("../models/UsuarioModel.php");

use models\UsuarioModel as UsuarioModel;

class ControlLogVend{
    public $rut;
    public $clave;

    public function __construct()
    {
        $this->rut   = $_POST['rut'];
        $this->clave = $_POST['clave'];
    }

    public function logVend(){
        session_start();
        if($this->rut=="" || $this->clave==""){
            $_SESSION['error']= "Complete los campos porfavor";
            header("Location: ../index.php");
            return;
        }

        $modelo = new UsuarioModel();
        $data   = $modelo->logUserVend($this->rut, $this->clave);

        if(count($data)== 0){
            $_SESSION['error']= "Vendedor no registrado";
            header("Location: ../index.php");
            return;
        }
        $_SESSION['vendedor'] = $data[0];

        header("Location: ../views/indexVend.php");
    }
}

$obj = new ControlLogVend();
$obj->logVend();
