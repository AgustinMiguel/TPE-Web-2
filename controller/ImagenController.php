<?php
require_once "./model/ImagenModel.php";
require_once "./view/ImagenView.php";
class ImagenController extends NbaController{
    private $imagenModel;
    function __construct(){
      $this->imagenModel = new ImagenModel();
      $this->view = new ImagenView();
  }

  function uploadImagenPlayer(){
    $this->checkLogIn();
    if($_SESSION['admin']!=0){
      if ($_FILES['imagen']['name']){
        if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/png") {
          $this->imagenModel->uploadImagenPlayer($_POST['id_jugador'], $_FILES['imagen']);
        }
      }
    }
    header("Location: " . URL_PLAYERS);
  }

  public function deleteImagenPlayer($params = null){
      $this->checkLogIn();
      if($_SESSION['admin']!=0){
      $id = $params[":ID"];
      $this->imagenModel->deleteImagenPlayer($id);
      }
      header("Location: " . URL_PLAYERS);
    }

    public function deleteImagenTeam($params = null){
        $this->checkLogIn();
        if($_SESSION['admin']!=0){
        $id = $params[":ID"];
        $this->imagenModel->deleteImagenTeam($id);
        }
        header("Location: " . URL_TEAMS);
      }


  function uploadImagenTeam(){
    $this->checkLogIn();
    if($_SESSION['admin']!=0){
      if ($_FILES['imagen']['name']){
        if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/png") {
          $this->imagenModel->uploadImagenTeam($_POST['id_equipo'], $_FILES['imagen']);
        }
      }
    }
    header("Location: " . URL_TEAMS);
  }
}
