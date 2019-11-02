<?php
require_once "Router.php";
require_once "controller/NbaController.php";
require_once "controller/LoginController.php";
require_once "controller/TeamsController.php";
require_once "controller/PlayersController.php";

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
$router->addRoute("teams", "GET", "TeamsController", "teamsTable");
$router->addRoute("addTeam", "POST", "TeamsController", "insertTeam");
$router->addRoute("deleteTeam/:ID", "GET", "TeamsController", "deleteTeam");
$router->addRoute("editTeam/:ID", "GET", "TeamsController", "editTeam");
$router->addRoute("updateTeam", "POST", "TeamsController", "updateTeam");
$router->addRoute("players", "GET", "PlayersController", "playersTable");
$router->addRoute("showPlayers/:ID", "GET", "PlayersController", "getTeamPlayers");
$router->addRoute("orderPlayers", "GET", "PlayersController", "getOrderedPlayers");
$router->addRoute("addPlayer", "POST", "PlayersController", "insertPlayer");
$router->addRoute("deletePlayer/:ID", "GET", "PlayersController", "deletePlayer");
$router->addRoute("editPlayer/:ID", "GET", "PlayersController", "editPlayer");
$router->addRoute("showPlayer/:ID", "GET", "PlayersController", "showPlayer");
$router->addRoute("updatePlayer", "POST", "PlayersController", "updatePlayer");
$router->addRoute("login", "GET", "LoginController", "login");
$router->addRoute("logout", "GET", "LoginController", "logout");
$router->addRoute("startSesion", "POST", "LoginController", "startSesion");

$router->setDefaultRoute("NbaController", "home");

$router->route($resource, $method);
