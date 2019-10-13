<?php
require_once "./model/TeamsModel.php";
require_once "./view/NbaView.php";

class NbaController {
  private $teamsModel;
  private $view;

  function __construct(){
    $this->teamsModel = new TeamsModel();
    $this->view = new NbaView();
  }

  function teamsTable(){
    $equipos = $this->teamsModel->getTeams();
    $this->view->displayTeams($equipos);
  }

  function insertTeam(){
    $this->teamsModel->insertTeam($_POST['nombre_equipo'],$_POST['partidos_ganados'],$_POST['partidos_perdidos']);
    header("Location: " . BASE_URL);
  }
  function deletTeam($id){
    $this->teamsModel->deletTeam($id);
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
