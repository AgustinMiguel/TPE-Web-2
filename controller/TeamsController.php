<?php
require_once "./model/TeamsModel.php";
require_once "./model/PlayersModel.php";
require_once "./view/TeamsView.php";
class TeamsController extends NbaController{
    private $teamsModel;
    function __construct(){
      $this->teamsModel = new TeamsModel();
      $this->view = new TeamsView();
  }
  function teamsTable(){
    session_start();
    $login = false;
    $admin = 0;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    if(isset($_SESSION['admin'])){
      if($_SESSION['admin']!=0){
        $admin = true;
      }
    }
    $equipos = $this->teamsModel->getTeams();
    $this->view->displayTeams($equipos, $login, $admin);
  }

  function insertTeam(){
    $this->checkLogIn();
    $nombre_equipo = $_POST['nombre_equipo'];
    $partidos_ganados = $_POST['partidos_ganados'];
    $partidos_perdidos = $_POST['partidos_perdidos'];
    if(($nombre_equipo != "")&&($partidos_ganados != "")&&($partidos_perdidos !="")){
      $this->teamsModel->insertTeam($nombre_equipo, $partidos_ganados, $partidos_perdidos);
    }
    header("Location: " . URL_TEAMS);
  }

  function deleteTeam($params = null){
    $this->checkLogIn();
    $id = $params[":ID"];
    $this->teamsModel->deleteTeam($id);
    header("Location: " . URL_TEAMS);
  }

  function editTeam($params = null){
    $this->checkLogIn();
    $login = false;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    if($_SESSION['admin']!=0){
      $admin = true;
    }
    $id = $params[":ID"];
    $team = $this->teamsModel->getTeam($id);
    $this->view->editTeam($team,$login,$admin);
  }

  function updateTeam(){
    $this->checkLogIn();
    $nombre_equipo = $_POST['nombre_equipo'];
    $partidos_ganados = $_POST['partidos_ganados'];
    $partidos_perdidos = $_POST['partidos_perdidos'];
    if(($nombre_equipo != "")&&($partidos_ganados != "")&&($partidos_perdidos !="")){
      $this->teamsModel->updateTeam($_POST['id_equipo'],$nombre_equipo,$partidos_ganados,$partidos_perdidos);
    }
    header("Location: " . URL_TEAMS);
  }
}
