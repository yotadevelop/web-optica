<?php 

namespace controllers;

require_once("../models/UsuarioModel.php");

use models\UsuarioModel as UsuarioModel;

class ControlInsertUser{
    
    public $rut;
    public $nombre;
    public $rol;
    public $clave;
    public $estado;

    public function __construct()
    {
       $this->rut=$_POST['rut'];
       $this->nombre=$_POST['nombre'];
       $this->rol=$_POST['rol'];
       $this->clave=$_POST['clave'];
       $this->estado=$_POST['estado'];
    }

    public function crearUsuario(){
        session_start();
        if($this->rut=="" || $this->nombre==""){
           $_SESSION['resp'] = "Complete los campos vacios";
            header("Location: ../views/GestionUsuarios.php");
            return;
        }
        $model = new UsuarioModel();
        $data  = ["rut"=>$this->rut, "nombre"=>$this->nombre, "rol"=>$this->rol, "clave"=>$this->clave, "estado"=>$this->estado]; 
        
        $count = $model->insert_User($data);
        if($count == 1){
            $_SESSION['resp']= "Usuario Creado con Éxito";
        }else{
            $_SESSION['resp']= "Error de base de datos";
        }
        header("Location: ../views/GestionUsuarios.php");
    }
}
$obj = new ControlInsertUser();
$obj->crearUsuario();
