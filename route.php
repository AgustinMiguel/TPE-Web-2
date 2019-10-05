<?php
require_once "controller/NbaController.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$controller = new NbaController();
if($action == ''){
    $controller->equiposTabla();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        if($partesURL[0] == "tabla"){
            $controller->equiposTabla();
        }elseif($partesURL[0] == "agregar"){
              $controller->insertEquipo();
          }
        }
    }
?>
