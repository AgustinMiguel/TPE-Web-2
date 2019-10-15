<?php

class UserModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
    }

    public function GetPassword($user){
        $sentencia = $this->db->prepare( "SELECT * FROM usuarios WHERE usuario = ?");
        $sentencia->execute(array($user));
        $password = $sentencia->fetch(PDO::FETCH_OBJ);
        return $password;
    }

    public function InsertUser($usuario, $password){
      $admin = 0;
      $sentencia = $this->db->prepare("INSERT INTO usuarios(usuario, contraseña, adm) VALUES(?,?,?)");
      $sentencia->execute(array($usuario, $password, $admin));
    }
}
