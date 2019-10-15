<?php
require_once "controller/NbaController.php";
require_once "Controller/LoginController.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_TABLE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/table');

$controller = new NbaController();
$controllerLogin = new LoginController();
if($action == ''){
    $controller->home();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        if($partesURL[0] == "table"){
            $controller->teamsTable();
        }elseif($partesURL[0] == "agregar"){
              $controller->insertTeam();
        }
      elseif($partesURL[0] == "delete"){
              $controller->deletTeam($partesURL[1]);
        }
      elseif($partesURL[0] == "edit"){
              $controller->editTeam($partesURL[1]);
        }
      elseif($partesURL[0] == "update"){
              $controller->updateTeam();
        }
        elseif($partesURL[0] == "login") {
            $controllerLogin->Login();
        }
        elseif($partesURL[0] == "startSesion") {
            $controllerLogin->startSesion();
        }
        elseif($partesURL[0] == "logout") {
            $controllerLogin->Logout();
        }
    }
  }
