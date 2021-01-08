<?php 

namespace controllers;
session_start();
require_once("../models/UsuarioModel.php");

use models\UsuarioModel as UsuarioModel;

class ControlBD{
    public $bt_edit;

    public function __construct()
    {
        $modelo = new UsuarioModel();
        $this->bt_edit=$_POST['bt_edit'];
    
        if(isset($this->bt_edit)){
            $_SESSION['Update'] = "ACTIVADO";
            $user= $modelo->findUsers($this->bt_edit); 
            $_SESSION['user'] = $user[0];

            header("Location: ../views/GestionUsuarios.php");
        }
    }


}
$obj = new ControlBD();