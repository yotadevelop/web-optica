<?php
namespace controllers;

use models\RecetaModel as RecetaModel;

require_once("../models/RecetaModel.php");

class ControlInsertReceta{

    public $tipo_lente;
    public $material_cristal;
    public $tipo_cristal;
    public $armazon;
    public $base;
    public $esfera_oi;
    public $esfera_od;
    public $cilindro_oi;
    public $cilindro_od;
    public $eje_oi;
    public $eje_od;
    public $prisma;
    public $pupilar;
    public $fecha_entrega;
    public $fecha_retiro;
    public $valor_lente;
    public $observacion;
    public $rut_cliente;
    public $rut_medico;
    public $nombre_medico;

    public function __construct()
    {
        $this->tipo_lente=$_POST['tipo_lente'];
        $this->material_cristal=$_POST['m.id_material_cristal'];
        $this->tipo_cristal=$_POST['t.id_tipo_cristal'];
        $this->armazon=$_POST['a.id_armazon'];
        $this->base=$_POST['base'];
        $this->esfera_oi=$_POST['esfera_oi'];
        $this->esfera_od=$_POST['esfera_od'];
        $this->cilindro_oi=$_POST['cilindro_oi'];
        $this->cilindro_od=$_POST['cilindro_od'];
        $this->eje_oi=$_POST['eje_oi'];
        $this->eje_od=$_POST['eje_od'];
        $this->prisma=$_POST['prisma'];
        $this->pupilar=$_POST['pupilar'];
        $this->fecha_entrega=$_POST['fecha_entrega'];
        $this->fecha_retiro=$_POST['fecha_retiro'];
        $this->valor_lente=$_POST['precio'];
        $this->observacion=$_POST['observacion'];
        $this->rut_cliente= $_POST['rut'];
        $this->rut_medico=$_POST['rut_medico'];
        $this->nombre_medico=$_POST['nombre_medico'];
    }

    public function crearReceta(){
        session_start();
        
            if($this->material_cristal=="" || $this->tipo_cristal="" || $this->armazon="" || $this->base="" || $this->esfera_oi="" || $this->esfera_od="" || $this->cilindro_oi="" || $this->cilindro_od="" || $this->eje_oi="" || $this->eje_od="" || $this->prisma="" || $this->pupilar="" || $this->fecha_entrega="" || $this->fecha_retiro="" || $this->valor_lente="" || $this->rut_medico="" || $this->nombre_medico=""){
                
                $_SESSION['resp'] = "¡¡¡¡Complete todos los campos por favor!!!!";
                header("Location: ../views/CrearReceta.php");
                return;
            }else{
                $modelo = new RecetaModel();
                $rut_user=$_SESSION['vendedor']['rut'];
                $this->rut_user=$rut_user;
                $data=["tipo_lente"=>$this->tipo_lente,"m.id_material_cristal"=>$this->material_cristal,"t.id_tipo_cristal"=>$this->tipo_cristal,
                "a.id_armazon"=>$this->armazon,"base"=>$this->base,"esfera_oi"=>$this->esfera_oi,"esfera_od"=>$this->esfera_od,"cilindro_oi"=>$this->cilindro_oi,"cilindro_od"=>$this->cilindro_od,
                "eje_oi"=>$this->eje_oi,"eje_od"=>$this->eje_od,"prisma"=>$this->prisma,"pupilar"=>$this->pupilar,"fecha_entrega"=>$this->fecha_entrega,"fecha_retiro"=>$this->fecha_retiro,
                "precio"=>$this->valor_lente,"observacion"=>$this->observacion,"rut"=>$this->rut_cliente,"rut_medico"=>$this->rut_medico,"nombre_medico"=>$this->nombre_medico,"rut_usuario"=>$this->rut_user];
                $count = $modelo->insertarReceta($data);

                if($count == 1){
                    $_SESSION['resp'] = "Cliente Creado";
                }else{
                    $_SESSION['resp']="ERROR en la base de datos";
                }
                header("Location: ../views/CrearReceta.php");
            }
    }
}
$obj =new ControlInsertReceta();
$obj->crearReceta();