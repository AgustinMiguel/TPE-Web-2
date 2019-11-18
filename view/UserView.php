<?php
require_once('libs/Smarty.class.php');

class UserView {
  function __construct(){
  }
  function displayUsers($users){
    $smarty = new Smarty();
    $smarty->assign('Titulo',"Tabla Jugadores");
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('users',$users);
    $smarty->display('templates/usersTable.tpl');
  }
  function displayRegistry(){
    $smarty = new Smarty();
    $smarty->assign('Titulo',"registry");
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->display('templates/registry.tpl');
  }
}
