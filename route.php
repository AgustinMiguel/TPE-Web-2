<?php
require_once "controller/NbaController.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$controller = new NbaController();
if($action == ''){
    $controller->teamsTable();
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
    }
  }
?>
