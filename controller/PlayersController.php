<?php
require_once "./model/TeamsModel.php";
require_once "./model/PlayersModel.php";
require_once "./model/ImagenModel.php";
require_once "./view/PlayersView.php";
require_once "./view/ImagenView.php";
class PlayersController extends NbaController{
  private $playersModel;
  private $imagenModel;
  private $imagenView;
  function __construct(){
    $this->playersModel = new PlayersModel();
    $this->imagenModel = new ImagenModel();
    $this->imagenView = new ImagenView();
    $this->view = new PlayersView();
    $this->titulo = 'NBA';
  }
  function playersTable(){
    session_start();
    $admin = false;
    $login = 0;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    if(isset($_SESSION['admin'])){
      if($_SESSION['admin']!=0){
        $admin = true;
      }
    }
    $players = $this->playersModel->getPlayers();
    $this->view->displayPlayers($players, $login, $admin);
  }

  function getTeamPlayers($params = null){
    session_start();
    $login = false;
    $admin = false;
    if(isset($_SESSION['user'])){
      $login = true;
      if($_SESSION['admin']!=0){
        $admin = true;
      }
    }
    $id = $params[":ID"];
    $img = $this->imagenModel->getImagenTeam($id);
    $players = $this->playersModel->getTeamPlayers($id);
    $this->view->showTeamPlayers($players,$login,$admin,$img);
  }

  function getOrderedPlayers(){
    session_start();
    $login = false;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    if($_SESSION['admin']!=0){
      $admin = true;
    }
    $players = $this->playersModel->getOrderedPlayers();
    $this->view->displayPlayers($players, $login, $admin);
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
    if($_SESSION['admin']!=0){
    $id = $params[":ID"];
    $this->playersModel->deletePlayer($id);
    }
    header("Location: " . URL_PLAYERS);
  }

  function editPlayer($params = null){
    $this->checkLogIn();
    $login = false;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    if($_SESSION['admin']!=0){
      $admin = true;
      $id = $params[":ID"];
      $player = $this->playersModel->getPlayer($id);
      $this->view->editPlayer($player,$login,$admin);
    }
  }

  function updatePlayer(){
    $this->checkLogIn();
    $nombre_jugador = $_POST['nombre_jugador'];
    $procedencia = $_POST['procedencia'];
    if(($nombre_jugador != "")&&($procedencia != "")&&($_SESSION['admin']!=0)){
      $this->playersModel->updatePlayer($_POST['id_jugador'],$nombre_jugador,$procedencia);
    }
    header("Location: " . URL_PLAYERS);
  }

  function showPlayer($params = null){
    $id = $params[":ID"];
    session_start();
    $login = false;
    $admin = false;
    $id_usuario=0;
    if(isset($_SESSION['user'])){
      $login = true;
      $id_usuario = $_SESSION['userId'];
      if($_SESSION['admin']!=0){
        $admin = true;
      }
    }
    $player = $this->playersModel->getPlayer($id);
    $img = $this->imagenModel->getImagenPlayer($id);
    $this->view->showPlayer($player,$login,$admin,$img,$id_usuario);
  }
}
