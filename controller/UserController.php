<?php
require_once "./model/UserModel.php";
require_once "./view/UserView.php";
class UserController extends NbaController{
  private $userModel;
  function __construct(){
    $this->userModel = new UserModel();
    $this->view = new UserView();
    $this->titulo ='NBA';
  }

  public function usersTable(){
    session_start();
    $users = $this->userModel->getUsers();
    $this->view->displayUsers($users);
  }

  public function registry(){
    session_start();
    $login = false;
    if(isset($_SESSION['user'])){
      header("Location: " . URL_HOME);
      die();
    }
      $this->view->displayRegistry();
  }

  public function insertUser(){
    session_start();
    $login = false;
    if(isset($_SESSION['user'])){
      header("Location: " . URL_HOME);
      die();
    }
    $usuario = $_POST['usuario'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    if(($this->userModel->verifyUser($usuario) == false)&&($this->userModel->verifyMail($mail)== false) && ($password !="")){
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $admin = 0;
      $this->userModel->insertUser($usuario, $admin, $mail, $hash);
      $user = $this->model->getPassword($usuario); //Esto lo pedo arreglar con un lastInsertId (Preguntar)
      $_SESSION['user'] = $usuario->usuario;
      $_SESSION['admin'] = $usuario->adm;
      $_SESSION['userId'] = $usuario->id;
      header("Location: " . URL_LOGGEDHOME);
    }
    else{
        header("Location: " . URL_REGISTRY);
    }
  }

  public function deletUser($params = null){
    $this->checkLogIn();
    $id = $params[":ID"];
    $usuario = $this->userModel->getUser($id);
    if ($_SESSION['user'] != $usuario->usuario) {
      $this->userModel->deleteUser($id);
    }
    header("Location: " . URL_USERS);
  }

  public function giveAdmin($params = null){
    $this->checkLogIn();
    $id = $params[":ID"];
    $this->userModel->giveAdmin($id);
    header("Location: " . URL_USERS);
  }

  public function removeAdmin($params = null){
    $this->checkLogIn();
    $id = $params[":ID"];
    $usuario = $this->userModel->getUser($id);
    if ($_SESSION['user'] != $usuario->usuario) {
      $this->userModel->removeAdmin($id);
    }
    header("Location: " . URL_USERS);
  }

  public function recoverPass($params = null){
    //nuevo template que pida usuario y mail, los verifica, crea una password random, la setea en la db y la envia por mail
  }
}
