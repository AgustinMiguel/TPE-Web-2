<?php
require_once('libs/Smarty.class.php');

class NbaView {
  function __construct(){
  }

  public function displayEquipos($equipos){
        $smarty = new Smarty();
        $smarty->assign('Titulo',"Tabla");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('equipos',$equipos);
        $smarty->display('templates/equipos.tpl');
    }
  }
?>
