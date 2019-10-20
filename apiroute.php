<?php
require_once("Router.php");
require_once("./api/ApiNbaController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("teams", "GET", "ApiNbaController", "teamsTable");
$router->addRoute("teams/:ID", "GET", "ApiNbaController", "getTeam");
$router->addRoute("tareas/:ID", "DELETE", "ApiNbaController", "deleteTask");
$router->addRoute("tareas", "POST", "ApiNbaController", "addTask");
$router->addRoute("tareas/:ID", "PUT", "ApiNbaController", "updateTask");


// rutea
$router->route($resource, $method);
