<?php

class UserModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
    }

    public function getPassword($user){
        $sentencia = $this->db->prepare( "SELECT * FROM usuarios WHERE usuario = ?");
        $sentencia->execute(array($user));
        $password = $sentencia->fetch(PDO::FETCH_OBJ);
        return $password;
    }

    public function getUser($id){
        $sentencia = $this->db->prepare( "SELECT * FROM usuarios WHERE id = ?");
        $sentencia->execute(array($id));
        $password = $sentencia->fetch(PDO::FETCH_OBJ);
        return $password;
    }

    public function getUsers(){
      $sentencia = $this->db->prepare( "select * from usuarios");
      $sentencia->execute();
      $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
      return $usuarios;
    }

    public function verifyUser($usuario){
      if ($usuario != ""){
        $sentencia = $this->db->prepare ("SELECT usuario from usuarios where usuario = ?");
        $sentencia->execute(array($usuario));
        $existe = $sentencia->fetch(PDO::FETCH_OBJ);
        if ($existe == false){
          return false;
        }
        else{
          return true;
        }
      return true;
    }
  }

    public function verifyMail($mail){
      if ($mail != ""){
        $sentencia = $this->db->prepare ("SELECT mail from usuarios where mail = ?");
        $sentencia->execute(array($mail));
        $existe = $sentencia->fetch(PDO::FETCH_OBJ);
        if ($existe == false){
          return false;
        }
        else{
          return true;
        }
      return true;
    }
  }

    public function insertUser($usuario, $admin, $mail, $password){
      $sentencia = $this->db->prepare("insert into usuarios(usuario,contraseña,adm,mail) VALUES(?,?,?,?)");
      $sentencia->execute(array($usuario,$password,$admin,$mail));
    }

    public function deleteUser($id){
        $sentencia = $this->db->prepare("delete from usuarios WHERE id=?");
        $sentencia->execute(array($id));
    }

    public function giveAdmin($id){
      $sentencia = $this->db->prepare("update usuarios set adm = 1 where id=?");
      $sentencia->execute(array($id));
    }

    public function removeAdmin($id){
      $sentencia = $this->db->prepare("update usuarios set adm = 0 where id=?");
      $sentencia->execute(array($id));
    }
}
