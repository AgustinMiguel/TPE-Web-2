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
    }
?>
