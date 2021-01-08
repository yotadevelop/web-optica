<?php
namespace controllers;

use models\ClienteModel as ClienteModel;

require_once("../models/ClienteModel.php");

class ControlInsertCliente{
    public $rut;
    public $nombre;
    public $direc;
    public $fono;
    public $fecha;
    public $email;

    public function __construct()
    {
        $this->rut    =$_POST['rut'];
        $this->nombre =$_POST['nombre'];
        $this->direc  =$_POST['direccion'];
        $this->fono   =$_POST['telefono'];
        $this->fecha  =$_POST['fecha'];
        $this->email  =$_POST['email'];
    }

    public function crearCliente(){
        session_start();
        if($this->rut=="" || $this->nombre=="" || $this->direc=="" || $this->fono=="" || $this->fecha=="" || $this->email==""){
            $_SESSION['resp'] = "Complete todos los campos por favor";
            header("Location: ../views/CrearCliente.php");
            return;
        }
        $model = new ClienteModel();
        $data =["rut"=>$this->rut, "nombre"=>$this->nombre, "direccion"=>$this->direc, "telefono"=>$this->fono, "fecha"=>$this->fecha, "email"=>$this->email];
        $count = $model->insert_Client($data);

        if($count == 1){
            $_SESSION['resp'] = "Cliente Creado";
        }else{
            $_SESSION['resp']="ERROR en la base de datos";
        }
        header("Location: ../views/CrearCliente.php");
    }
}
$obj = new ControlInsertCliente();
$obj->crearCliente();