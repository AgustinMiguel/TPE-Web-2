<?php
class PlayersModel{

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
  }

  public function getPlayers(){
        $sentencia = $this->db->prepare( "select * from jugadores J join equipos E on J.id_equipo = E.id_equipo");
        $sentencia->execute();
        $players = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $players;
  }
  public function getPlayer($id_jugador){
        $sentencia = $this->db->prepare( "select * from jugadores J join equipos E on J.id_equipo = E.id_equipo where J.id_jugador=?");
        $sentencia->execute(array($id_jugador));
        $player = $sentencia->fetch(PDO::FETCH_OBJ);
        return $player;
      }
  public function getTeamPlayers($id){
        $sentencia = $this->db->prepare( "select * from jugadores J join equipos E on J.id_equipo = E.id_equipo where J.id_equipo =?");
        $sentencia->execute(array($id));
        $players = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $players;
  }

  public function getOrderedPlayers(){
        $sentencia = $this->db->prepare( "select * from jugadores J join equipos E on J.id_equipo = E.id_equipo order by J.id_equipo");
        $sentencia->execute();
        $players = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $players;
  }

  public function deletePlayer($id_jugador){
      $sentencia = $this->db->prepare("delete from jugadores WHERE id_jugador=?");
      $sentencia->execute(array($id_jugador));
  }

  public function insertPlayer($nombre_jugador ,$procedencia , $id_equipo ){
        $sentencia = $this->db->prepare("insert into jugadores(nombre_jugador,procedencia,id_equipo) VALUES(?,?,?)");
        $sentencia->execute(array($nombre_jugador,$procedencia,$id_equipo ));
  }

  public function updatePlayer($id_jugador,$nombre_jugador,$procedencia){
    $sentencia = $this->db->prepare("update jugadores set nombre_jugador = ?, procedencia = ? where id_jugador=?");
    $sentencia->execute(array($nombre_jugador, $procedencia, $id_jugador,));
  }
}
