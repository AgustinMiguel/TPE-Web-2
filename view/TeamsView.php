<?php
require_once('libs/Smarty.class.php');

class TeamsView {
  function __construct(){
  }
    public function displayTeams($equipos, $login, $admin){
          $smarty = new Smarty();
          $smarty->assign('Titulo',"Tabla Equpos");
          $smarty->assign('BASE_URL',BASE_URL);
          $smarty->assign('login',$login);
          $smarty->assign('equipos',$equipos);
          $smarty->assign('admin',$admin);
          $smarty->display('templates/teamsTable.tpl');
      }
      public function editTeam  ($equipo,$login,$admin){
          $smarty = new Smarty();
          $smarty->assign('Titulo',"EditarEquipo");
          $smarty->assign('BASE_URL',BASE_URL);
          $smarty->assign('equipo',$equipo);
          $smarty->assign('login',$login);
          $smarty->assign('admin',$admin);
          $smarty->display('templates/editTeam.tpl');
    }
  }
