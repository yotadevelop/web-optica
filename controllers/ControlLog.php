<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class ControlLog{
  
    public $rut;
    public $clave;

    public function __construct()
    {
        $this->rut = $_POST['rut_ad'];
        $this->clave = $_POST['clave_ad'];
    }

    public function iniciarLogin(){
        session_start();
        if($this->rut=="" || $this->clave==""){
            $_SESSION['error'] = "¡¡Campos Vacios!!, por favor complete los campos";
            header("Location: ../index.php");
            return;
        }

        $modelo = new UsuarioModel();
        $data = $modelo->logUser($this->rut, $this->clave);
        if(count($data) == 0){
            $_SESSION['error'] = "Usuario no registrado";
            header("Location: ../index.php");
            return;
        }

        $_SESSION['usuario'] = $data[0];

        header("Location: ../views/GestionUsuarios.php");
    }
}
$obj = new ControlLog();
$obj->iniciarLogin();

