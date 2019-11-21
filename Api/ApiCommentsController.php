<?php
require_once("./model/CommentsModel.php");
require_once("./model/UserModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class ApiCommentsController extends ApiController{

public function getComments($params = null)
{
  $id = $params[':ID'];
  $comments = $this->commentsModel->getComments($id);
  if ($comments) {
      $this->view->response($comments, 200);
  } else {
      $this->view->response("No existen comentarios del jugador con el id={$id}", 404);
  }
}

public function deleteComment($params = [])
{
  $id = $params[':ID'];
  $comment = $this->commentsModel->getComment($id);

  if ($comment) {
      $this->commentsModel->deleteComment($id);
      $this->view->response("Comment con el id=$id eliminado con exito", 200);
  }
  else
      $this->view->response("Comment con el id=$id not found", 404);
}

public function addComment()
{
  $body = $this->getData();
  $id_jugador = $body->id_jugador;
  $id_usuario = $body->id_usuario;
  $texto = $body->texto;
  $puntuacion = $body->puntuacion;
  $fecha = $body->fecha;
  $comment = $this->commentsModel->addComment($id_jugador,$id_usuario,$texto,$puntuacion,$fecha);
}
}
