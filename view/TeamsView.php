<?php
require_once('libs/Smarty.class.php');

class TeamsView {
  function __construct(){
  }
    public function displayTeams($equipos, $login){
          $smarty = new Smarty();
          $smarty->assign('Titulo',"Tabla Equpos");
          $smarty->assign('BASE_URL',BASE_URL);
          $smarty->assign('login',$login);
          $smarty->assign('equipos',$equipos);
          $smarty->display('templates/teamsTable.tpl');
      }
      public function editTeam  ($equipo){
          $smarty = new Smarty();
          $smarty->assign('Titulo',"EditarEquipo");
          $smarty->assign('BASE_URL',BASE_URL);
          $smarty->assign('equipo',$equipo);
          $smarty->display('templates/editTeam.tpl');
    }
  }
