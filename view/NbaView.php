<?php
require_once('libs/Smarty.class.php');

class NbaView {
  function __construct(){
  }

  public function displayHome($titulo, $login){
        $smarty = new Smarty();
        $smarty->assign('Titulo',$titulo);
        $smarty->assign('login',$login);
        $smarty->display('templates/home.tpl');
  }
  public function displayAdmHome($titulo){
        $smarty = new Smarty();
        $smarty->assign('Titulo',$titulo);
        $smarty->display('templates/admhome.tpl');
  }
}
