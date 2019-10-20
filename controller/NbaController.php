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
      if(!isset($_SESSION['userId'])){
          header("Location: " . URL_HOME);
          die();
      }
      if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
          header("Location: " . URL_LOGOUT);
          die(); // destruye la sesión, y vuelve al login
      }
      $_SESSION['LAST_ACTIVITY'] = time();
  }

  function home(){
    $login = false;
    if($_SESSION['user'] = 1){
      $login = true;
    }
    $this->view->displayHome($this->titulo, $login);
  }

  function teamsTable(){
    $equipos = $this->teamsModel->getTeams();
    $this->view->displayTeams($equipos);
  }

  function playersTable(){
    $players = $this->playersModel->getPlayers();
    $teams = $this->teamsModel->getTeams();
    $this->view->displayPlayers($players, $teams); //Para poder elegir equipo al agregar jugador
  }

  function getTeamPlayers($params = null){
    $id = $params[":ID"];
    $players = $this->playersModel->getTeamPlayers($id);
    $this->view->displayTeamPlayers($players);
  }

  function getOrderedPlayers(){
    $players = $this->playersModel->getOrderedPlayers();
    $this->view->displayOrderedPlayers($players);
  }

  function insertTeam(){
    $this->teamsModel->insertTeam($_POST['nombre_equipo'],$_POST['partidos_ganados'],$_POST['partidos_perdidos']);
    header("Location: " . URL_TEAMS);
  }

  function insertPlayer(){
    $this->playersModel->insertPlayer($_POST['nombre_jugador'],$_POST['procedencia'],$_POST['id_equipo']);
    header("Location: " . URL_PLAYERS);
  }

  function deleteTeam($params = null){
    $id = $params[":ID"];
    $this->teamsModel->deleteTeam($id);
    header("Location: " . URL_TEAMS);
  }

  function deletePlayer($params = null){
    $id = $params[":ID"];
    $this->playersModel->deletePlayer($id);
    header("Location: " . URL_PLAYERS);
  }

  function editTeam($params = null){
    $id = $params[":ID"];
    $team = $this->teamsModel->getTeam($id);
    $this->view->editTeam($team);
  }

  function editPlayer($params = null){
    $id = $params[":ID"];
    $player = $this->playersModel->getPlayer($id);
    $this->view->editPlayer($player);
  }

  function updateTeam(){
    $this->teamsModel->updateTeam($_POST['id_equipo'],$_POST['nombre_equipo'],$_POST['partidos_ganados'],$_POST['partidos_perdidos']);
    header("Location: " . URL_TEAMS);
  }

  function updatePlayer(){
    $this->playersModel->updatePlayer($_POST['id_jugador'],$_POST['nombre_jugador'],$_POST['procedencia']);
    header("Location: " . URL_PLAYERS);
  }
  function showPlayer($params = null){
    $id = $params[":ID"];
    $player = $this->playersModel->getPlayer($id);
    $this->view->showPlayer($player);
  }
}
