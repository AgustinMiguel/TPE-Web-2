<?php
class ImagenModel{

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
  }

public function uploadImagenPlayer($id, $imagen){
  $filepath = null;
  $filepath =  $this->moveFile($imagen);
  $sentencia = $this->db->prepare("insert into jugadoresimg(id_jugador,url) VALUES(?,?)");
  $sentencia->execute(array($id,$filepath));
}

public function deleteImagenPlayer($id){
  //delete imagen con el id
}

public function uploadImagenTeam($id, $imagen){
  $filepath = null;
  $filepath =  $this->moveFile($imagen);
  $sentencia = $this->db->prepare("insert into equiposimg(id_equipo,url) VALUES(?,?)");
  $sentencia->execute(array($id,$filepath));
}
private function moveFile($imagen) {
    $filepath = "img/nba/" . uniqid() . "." . strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));
    move_uploaded_file($imagen['tmp_name'], $filepath);
    return $filepath;
  }
}
