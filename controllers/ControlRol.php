<?php

namespace controllers;

class ControlRol{
    
    public $admin;
    public $vend;

    public function __construct()
    {
        $this->admin =$_POST['bt_admin'];
        $this->vend  =$_POST['bt_vend'];

        session_start();
        if(isset($this->vend)){
            $_SESSION['rol'] ="ON";
        }else{
            unset($_SESSION['rol']);
        }
        header("Location: ../index.php");
    }

}

$obj = new ControlRol();