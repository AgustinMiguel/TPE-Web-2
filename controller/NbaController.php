<?php
require_once "./model/TeamsModel.php";
require_once "./model/PlayersModel.php";
require_once "./view/NbaView.php";
class NbaController {
  private $view;
  private $titulo;
  function __construct(){
    $this->view = new NbaView();
    $this->titulo = 'NBA';
  }
  public function checkLogIn(){
      session_start();
      if(!isset($_SESSION['user'])){
          header("Location: " . URL_HOME);
          die();
      }

      if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
          header("Location: " . URL_LOGIN);
          die();
      }
      $_SESSION['LAST_ACTIVITY'] = time();
  }

  function home(){
    session_start();
    $login = false;
    $admin = false;
    if(isset($_SESSION['user'])){
      $login = true;
    }
    if(isset($_SESSION['admin'])){
      if($_SESSION['admin']!=0){
        $admin = true;
      }
    }
    $this->view->displayHome($this->titulo, $login,$admin);
  }

  function loggedHome(){
    $this->checkLogIn();
    $admin = false;
    if(isset($_SESSION['admin'])){
      if($_SESSION['admin']!=0){
        $admin = true;
      }
    }
    $this->view->displayLoggedHome($this->titulo, $admin);
  }
}
