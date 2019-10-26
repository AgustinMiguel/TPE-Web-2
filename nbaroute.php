<?php
require_once "Router.php";
require_once "controller/NbaController.php";
require_once "controller/LoginController.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_HOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/home');
define("URL_ADMHOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/admhome');
define("URL_TEAMS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/teams');
define("URL_PLAYERS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/players');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

$resource = $_GET["resource"];

$method = $_SERVER["REQUEST_METHOD"];

$router = new Router();

$router->addRoute("home", "GET", "NbaController", "home");
$router->addRoute("admhome", "GET", "NbaController", "admhome");
$router->addRoute("teams", "GET", "NbaController", "teamsTable");
$router->addRoute("players", "GET", "NbaController", "playersTable");
$router->addRoute("showPlayers/:ID", "GET", "NbaController", "getTeamPlayers");
$router->addRoute("orderPlayers", "GET", "NbaController", "getOrderedPlayers");
$router->addRoute("addPlayer", "POST", "NbaController", "insertPlayer");
$router->addRoute("deletePlayer/:ID", "GET", "NbaController", "deletePlayer");
$router->addRoute("editPlayer/:ID", "GET", "NbaController", "editPlayer");
$router->addRoute("showPlayer/:ID", "GET", "NbaController", "showPlayer");
$router->addRoute("updatePlayer", "POST", "NbaController", "updatePlayer");
$router->addRoute("addTeam", "POST", "NbaController", "insertTeam");
$router->addRoute("deleteTeam/:ID", "GET", "NbaController", "deleteTeam");
$router->addRoute("editTeam/:ID", "GET", "NbaController", "editTeam");
$router->addRoute("updateTeam", "POST", "NbaController", "updateTeam");
$router->addRoute("login", "GET", "LoginController", "login");
$router->addRoute("logout", "GET", "LoginController", "logout");
$router->addRoute("startSesion", "POST", "LoginController", "startSesion");

$router->setDefaultRoute("NbaController", "home");

$router->route($resource, $method);
