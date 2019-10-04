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
}
 ?>
