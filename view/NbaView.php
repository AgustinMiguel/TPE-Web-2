<?php
require_once('libs/Smarty.class.php');

class NbaView {
  function __construct(){
  }

  public function displayHome($titulo, $login,$admin){
        $smarty = new Smarty();
        $smarty->assign('Titulo',$titulo);
        $smarty->assign('login',$login);
        $smarty->assign('admin',$admin);
        $smarty->display('templates/home.tpl');
  }
  public function displayLoggedHome($titulo, $admin){
        $smarty = new Smarty();
        $smarty->assign('Titulo',$titulo);
        $smarty->assign('admin',$admin);
        $smarty->display('templates/admhome.tpl');
  }
}
