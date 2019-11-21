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

public function deleteImagenPlayer($id_imagen){
  $sentencia = $this->db->prepare("delete from jugadoresimg WHERE id_imagen=?");
  $sentencia->execute(array($id_imagen));
}

public function deleteImagenTeam($id_imagen){
  $sentencia = $this->db->prepare("delete from equiposimg WHERE id_imagen=?");
  $sentencia->execute(array($id_imagen));
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
public function getImagenPlayer($id){
        $sentencia = $this->db->prepare( "select * from jugadoresimg where id_jugador = ?");
        $sentencia->execute(array($id));
        $img = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $img;
  }

  public function getImagenTeam($id){
          $sentencia = $this->db->prepare( "select * from equiposimg where id_equipo = ?");
          $sentencia->execute(array($id));
          $img = $sentencia->fetchAll(PDO::FETCH_OBJ);
          return $img;
    }
}
