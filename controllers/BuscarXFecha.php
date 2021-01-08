<?php

namespace controllers;

use models\RecetaModel as RecetaModel;

session_start();
require_once("../models/RecetaModel.php");

class BuscarXFecha
{
  public $fecha;

  public function __construct()
  {
    $this->fecha = $_POST["fecha"];
  }
  public function recetas()
  {
    if (isset($_SESSION["vendedor"])) {
      $modelo = new RecetaModel();
      $arr = $modelo->recetaXFechas($this->fecha);
      echo json_encode($arr);
    } else {
      echo json_encode(["msg" => "<i class='fas fa-exclamation-circle'></i> Acceso Denegado"]);
    }
  }
}

$obj = new BuscarXFecha();
$obj->recetas();