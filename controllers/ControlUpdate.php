<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class ControlUpdate{
    public $rut;
    public $estado;
    
    public function __construct()
    {
        $this->rut    = $_POST['rut'];
        $this->estado = $_POST['estado'];
    }

    public function update_user(){
        session_start();
        if(isset($_SESSION['usuario'])){
            if($this->rut =="" || $this->estado==""){
                $_SESSION['resp'] = "Complete los campos porfavor";
                header("Location: ../views/GestionUsuarios.php");
                return;
            }

            $data=["rut" => $this->rut, "estado" => $this->estado];
            $modelo = new UsuarioModel();
            $count = $modelo->editar($data);
            
            if($count == 1){
                $state = $this->estado == 0 ? 'Bloqueado' : 'Habilitado';
                $_SESSION['resp'] = "Usuario $state";
            }else{
                $_SESSION['resp'] = "Error en la BD!!";
            }
            header("Location: ../views/GestionUsuarios.php");
        }else{
            echo json_encode(["resp" => "Acceso Denegado"]);
        }
    }    
}
$obj = new ControlUpdate();
$obj->update_user();