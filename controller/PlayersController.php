<?php
require_once "./model/TeamsModel.php";
require_once "./model/PlayersModel.php";
require_once "./view/PlayersView.php";
class PlayersController extends NbaController{
  function __construct(){
    $this->playersModel = new PlayersModel();
    $this->view = new PlayersView();
    $this->titulo = 'NBA';
  }
  private $playersModel;
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
    $this->view->showTeamPlayers($players,$login);
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

  function insertPlayer(){
    $this->checkLogIn();
    $nombre_jugador = $_POST['nombre_jugador'];
    $procedencia = $_POST['procedencia'];
    if(($nombre_jugador != "")&&($procedencia != "")){
      $this->playersModel->insertPlayer($nombre_jugador,$procedencia,$_POST['id_equipo']);
    }
    header("Location: " . URL_PLAYERS);
  }

  function deletePlayer($params = null){
    $this->checkLogIn();
    $id = $params[":ID"];
    $this->playersModel->deletePlayer($id);
    header("Location: " . URL_PLAYERS);
  }

  function editPlayer($params = null){
    $this->checkLogIn();
    $id = $params[":ID"];
    $player = $this->playersModel->getPlayer($id);
    $this->view->editPlayer($player);
  }

  function updatePlayer(){
    $this->checkLogIn();
    $nombre_jugador = $_POST['nombre_jugador'];
    $procedencia = $_POST['procedencia'];
    if(($nombre_jugador != "")&&($procedencia != "")){
      $this->playersModel->updatePlayer($_POST['id_jugador'],$nombre_jugador,$procedencia);
  }
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
