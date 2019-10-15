<?php
require_once("Router.php");
require_once "controller/NbaController.php";
require_once "Controller/LoginController.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$action = $_GET["action"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("", "GET", "NbaController", "home");
$router->addRoute("table", "GET", "NbaController", "teamsTable");
$router->addRoute("agregar", "GET", "NbaController", "insertTeam");
$router->addRoute("delete/:ID", "GET", "NbaController", "deletTeam");
$router->addRoute("edit/:ID", "GET", "NbaController", "editTeam");
$router->addRoute("update", "GET", "NbaController", "updateTeam");


// rutea
$router->route($action, $method);
