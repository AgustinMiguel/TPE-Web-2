<?php
class CommentsModel{

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
  }

  public function addComment($id_jugador, $id_usuario, $texto,$puntuacion,$fecha)
  {
    $sentencia = $this->db->prepare("insert into comentarios(id_jugador,id_usuario,texto,puntuacion,fecha) VALUES(?,?,?,?,?)");
    $sentencia->execute(array($id_jugador, $id_usuario ,$texto,$puntuacion,$fecha ));
  }

  public function deleteComment($id_comentario)
  {
    $sentencia = $this->db->prepare("delete from comentarios WHERE id_comentario=?");
    $sentencia->execute(array($id_comentario));
  }

  public function getComments($id_jugador)
  {
    $sentencia = $this->db->prepare( "select * from comentarios C join usuarios U on C.id_usuario = U.id_usuario where C.id_jugador=?");
    $sentencia->execute();
    $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $comentarios;
  }

  public function getComment($id_comentario)
  {
    $sentencia = $this->db->prepare( "select * from comentarios where id_comentario=?");
    $sentencia->execute(array($id_comentario));
    $comment = $sentencia->fetch(PDO::FETCH_OBJ);
    return $comment;
  }
}
