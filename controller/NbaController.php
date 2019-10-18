<?php
require_once "./model/TeamsModel.php";
require_once "./model/PlayersModel.php";
require_once "./view/NbaView.php";

class NbaController {
  private $teamsModel;
  private $playersModel;
  private $view;
  private $titulo;
  function __construct(){
    $this->teamsModel = new TeamsModel();
    $this->playersModel = new PlayersModel();
    $this->view = new NbaView();
    $this->titulo = 'NBA';
  }

  function home(){
    $this->view->displayHome($this->titulo);
  }

  function teamsTable(){
    $equipos = $this->teamsModel->getTeams();
    $this->view->displayTeams($equipos);
  }

  function playersTable(){
    $players = $this->playersModel->getPlayers();
    $this->view->displayPlayers($players);
  }

  function insertTeam(){
    $this->teamsModel->insertTeam($_POST['nombre_equipo'],$_POST['partidos_ganados'],$_POST['partidos_perdidos']);
    header("Location: " . URL_TABLE);
  }
  function deletTeam($params = null){
    $id = $params[":ID"];
    $this->teamsModel->deletTeam($id);
    header("Location: " . URL_TABLE);
  }

  function editTeam($params = null){
    $id = $params[":ID"];
    $team = $this->teamsModel->getTeam($id);
    $this->view->editTeam($team);
  }
  function updateTeam(){
    $this->teamsModel->updateTeam($_POST['id_equipo'],$_POST['nombre_equipo'],$_POST['partidos_ganados'],$_POST['partidos_perdidos']);
    header("Location: " . URL_TABLE);
  }
}
