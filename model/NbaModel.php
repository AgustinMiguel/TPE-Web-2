<?php
class NbaModel {
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
    }

    public function getEquipos(){
          $sentencia = $this->db->prepare( "select * from equipos");
          $sentencia->execute();
          $equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
          return $equipos;
      }

    public function insertEquipo($nombre_equipo,$partidos_ganados,$partidos_perdidos){
        $sentencia = $this->db->prepare("INSERT INTO equipos(nombre_equipo, partidos_ganados,partidos_perdidos) VALUES(?,?,?)");
        $sentencia->execute(array($nombre_equipo,$partidos_ganados,$partidos_perdidos));
    }
  }
?>
