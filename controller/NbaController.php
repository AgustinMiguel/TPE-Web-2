<?php
require_once "./model/NbaModel.php";
require_once "./view/NbaView.php";

class NbaController {
  private $model;
  private $view;

  function __construct(){
    $this->model = new NbaModel();
    $this->view = new NbaView();
  }

  function equiposTabla(){
    $equipos = $this->model->getEquipos();
    $this->view->displayEquipos($equipos);
  }

  function insertEquipo(){
    $this->model->insertEquipo($_POST['nombre_equipo'],$_POST['partidos_ganados'],$_POST['partidos_perdidos']);
    header("Location: " . BASE_URL);
  }
  function deletEquipo($id){
    $this->model->deletEquipo($id);
    header("Location: " . BASE_URL);
  }
}

?>
