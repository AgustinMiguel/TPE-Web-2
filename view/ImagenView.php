<?php
require_once('libs/Smarty.class.php');

class ImagenView {
  function __construct(){
  }

  public function addImagen($login,$admin,$id){
      $smarty = new Smarty();
      $smarty->assign('login',$login);
      $smarty->assign('admin',$admin);
      $smarty->assign('id',$id);
      $smarty->display('templates/addImagen.tpl');
  }
}
