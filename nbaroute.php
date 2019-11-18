<?php
require_once "Router.php";
require_once "controller/NbaController.php";
require_once "controller/LoginController.php";
require_once "controller/TeamsController.php";
require_once "controller/PlayersController.php";
require_once "controller/UserController.php";
require_once "controller/ImagenController.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_HOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/home');
define("URL_LOGGEDHOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/loggedHome');
define("URL_TEAMS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/teams');
define("URL_PLAYERS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/players');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("URL_REGISTRY", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/registry');
define("URL_USERS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/users');

$resource = $_GET["resource"];

$method = $_SERVER["REQUEST_METHOD"];

$router = new Router();

$router->addRoute("home", "GET", "NbaController", "home");
$router->addRoute("registry", "GET", "UserController", "registry");
$router->addRoute("insertUser", "POST", "UserController", "insertUser");
$router->addRoute("deleteUser/:ID", "GET", "UserController", "deletUser");
$router->addRoute("giveAdmin/:ID", "GET", "UserController", "giveAdmin");
$router->addRoute("removeAdmin/:ID", "GET", "UserController", "removeAdmin");
$router->addRoute("loggedHome", "GET", "NbaController", "loggedHome");
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
$router->addRoute("uploadImagenPlayer", "POST", "ImagenController", "uploadImagenPlayer");
$router->addRoute("uploadImagenTeam", "POST", "ImagenController", "uploadImagenTeam");
$router->addRoute("showPlayer/:ID", "GET", "PlayersController", "showPlayer");
$router->addRoute("updatePlayer", "POST", "PlayersController", "updatePlayer");
$router->addRoute("login", "GET", "LoginController", "login");
$router->addRoute("logout", "GET", "LoginController", "logout");
$router->addRoute("startSesion", "POST", "LoginController", "startSesion");
$router->addRoute("users", "GET", "UserController", "usersTable");
$router->setDefaultRoute("NbaController", "home");

$router->route($resource, $method);
