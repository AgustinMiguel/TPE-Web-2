<?php
require_once("Router.php");
require_once("api/ApiNbaController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("teams", "GET", "ApiNbaController", "getTeams");
$router->addRoute("teams/:ID", "GET", "ApiNbaController", "getTeam");
$router->addRoute("teams/:ID", "DELETE", "ApiNbaController", "deleteTeam");
$router->addRoute("teams", "POST", "ApiNbaController", "addTeam");
$router->addRoute("teams/:ID", "PUT", "ApiNbaController", "updateTeam");
$router->addRoute("players", "GET", "ApiNbaController", "getPlayers");
$router->addRoute("players/:ID", "GET", "ApiNbaController", "getPlayer");
$router->addRoute("players/:ID", "DELETE", "ApiNbaController", "deletePlayer");
$router->addRoute("players", "POST", "ApiNbaController", "addPlayer");
$router->addRoute("players/:ID", "PUT", "ApiNbaController", "updatePlayer");


// rutea
$router->route($resource, $method);
