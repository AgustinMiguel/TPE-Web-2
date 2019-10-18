<?php
require_once "Router.php";
require_once "controller/NbaController.php";
require_once "controller/LoginController.php";


define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_TABLE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/teams');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("home", "GET", "NbaController", "home");
$router->addRoute("teams", "GET", "NbaController", "teamsTable");
$router->addRoute("players", "GET", "NbaController", "playersTable");
$router->addRoute("agregar", "POST", "NbaController", "insertTeam");
$router->addRoute("delete/:ID", "GET", "NbaController", "deletTeam");
$router->addRoute("edit/:ID", "GET", "NbaController", "editTeam");
$router->addRoute("update", "POST", "NbaController", "updateTeam");
$router->addRoute("login", "GET", "LoginController", "login");
$router->addRoute("startSesion", "POST", "LoginController", "startSesion");

$router->setDefaultRoute("NbaController", "home");

// rutea
$router->route($resource, $method);
