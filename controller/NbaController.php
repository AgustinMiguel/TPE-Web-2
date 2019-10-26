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
  public function checkLogIn(){
      session_start();
      if(!isset($_SESSION['user'])){
          header("Location: " . URL_HOME);
          die();
      }

      if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
          header("Location: " . URL_LOGIN);
          die();
      }
      $_SESSION['LAST_ACTIVITY'] = time();
  }

  function home(){
    session_start();
    $login = false;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    $this->view->displayHome($this->titulo, $login);
  }

  function admhome(){
    $this->checkLogIn();
    $this->view->displayAdmHome($this->titulo);
  }

  function teamsTable(){
    session_start();
    $login = false;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    $equipos = $this->teamsModel->getTeams();
    $this->view->displayTeams($equipos, $login);
  }

  function playersTable(){
    session_start();
    $login = false;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    $players = $this->playersModel->getPlayers();
    $this->view->displayPlayers($players, $login);
  }

  function getTeamPlayers($params = null){
    session_start();
    $login = false;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    $id = $params[":ID"];
    $players = $this->playersModel->getTeamPlayers($id);
    $this->view->displayPlayers($players,$login);
  }

  function getOrderedPlayers(){
    session_start();
    $login = false;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    $players = $this->playersModel->getOrderedPlayers();
    $this->view->displayPlayers($players, $login);
  }

  function insertTeam(){
    $this->checkLogIn();
    $this->teamsModel->insertTeam($_POST['nombre_equipo'],$_POST['partidos_ganados'],$_POST['partidos_perdidos']);
    header("Location: " . URL_TEAMS);
  }

  function insertPlayer(){
    $this->checkLogIn();
    $this->playersModel->insertPlayer($_POST['nombre_jugador'],$_POST['procedencia'],$_POST['id_equipo']);
    header("Location: " . URL_PLAYERS);
  }

  function deleteTeam($params = null){
    $this->checkLogIn();
    $id = $params[":ID"];
    $this->teamsModel->deleteTeam($id);
    header("Location: " . URL_TEAMS);
  }

  function deletePlayer($params = null){
    $this->checkLogIn();
    $id = $params[":ID"];
    $this->playersModel->deletePlayer($id);
    header("Location: " . URL_PLAYERS);
  }

  function editTeam($params = null){
    $this->checkLogIn();
    $id = $params[":ID"];
    $team = $this->teamsModel->getTeam($id);
    $this->view->editTeam($team);
  }

  function editPlayer($params = null){
    $this->checkLogIn();
    $id = $params[":ID"];
    $player = $this->playersModel->getPlayer($id);
    $this->view->editPlayer($player);
  }

  function updateTeam(){
    $this->checkLogIn();
    $this->teamsModel->updateTeam($_POST['id_equipo'],$_POST['nombre_equipo'],$_POST['partidos_ganados'],$_POST['partidos_perdidos']);
    header("Location: " . URL_TEAMS);
  }

  function updatePlayer(){
    $this->checkLogIn();
    $this->playersModel->updatePlayer($_POST['id_jugador'],$_POST['nombre_jugador'],$_POST['procedencia']);
    header("Location: " . URL_PLAYERS);
  }
  function showPlayer($params = null){
    $id = $params[":ID"];
    session_start();
    $login = false;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    $player = $this->playersModel->getPlayer($id);
    $this->view->showPlayer($player,$login);
  }
}
