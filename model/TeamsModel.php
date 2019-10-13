<?php
class TeamsModel {
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
    }

    public function getTeams(){
          $sentencia = $this->db->prepare( "select * from equipos");
          $sentencia->execute();
          $teams = $sentencia->fetchAll(PDO::FETCH_OBJ);
          return $teams;
      }

    public function getTeam($id_equipo){
          $sentencia = $this->db->prepare( "select * from equipos where id_equipo=?");
          $sentencia->execute(array($id_equipo));
          $team = $sentencia->fetchAll(PDO::FETCH_OBJ);
          return $team;
        }

    public function insertTeam($nombre_equipo,$partidos_ganados,$partidos_perdidos){
        $sentencia = $this->db->prepare("insert into equipos(nombre_equipo, partidos_ganados,partidos_perdidos) VALUES(?,?,?)");
        $sentencia->execute(array($nombre_equipo,$partidos_ganados,$partidos_perdidos));
    }
    public function updateTeam($id_equipo,$nombre_equipo,$partidos_ganados,$partidos_perdidos){
      $sentencia = $this->db->prepare("update equipos set nombre_equipo = ?, partidos_ganados = ?, partidos_perdidos = ? where id_equipo=?");
      $sentencia->execute(array($id_equipo,$nombre_equipo, $partidos_ganados, $partidos_perdidos));
    }

    public function deletTeam($id_equipo){
        $sentencia = $this->db->prepare("delete from equipos WHERE id_equipo=?");
        $sentencia->execute(array($id_equipo));
    }
  }
?>
