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

  function teamsTable(){
    $equipos = $this->model->getTeams();
    $this->view->displayTeams($equipos);
  }

  function insertTeam(){
    $this->model->insertTeam($_POST['nombre_equipo'],$_POST['partidos_ganados'],$_POST['partidos_perdidos']);
    header("Location: " . BASE_URL);
  }
  function deletTeam($id){
    $this->model->deletTeam($id);
    header("Location: " . BASE_URL);
  }

  function editTeam($id){
    $team = $this->model->getTeam($id);
    $this->view->editTeam("Editar Equipo", $team);
  }
  function updateTeam(){
    $this->model->updateTeam($_POST['id_equipo'],$_POST['nombre_equipo'],$_POST['partidos_ganados'],$_POST['partidos_perdidos']);
    header("Location: " . BASE_URL);
  }
}

?>
