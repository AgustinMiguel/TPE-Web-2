<?php
require_once('libs/Smarty.class.php');

class NbaView {
  function __construct(){
  }

  public function displayHome($titulo){
        $smarty = new Smarty();
        $smarty->assign('Titulo',$titulo);
        $smarty->display('templates/home.tpl');
  }

  public function displayTeams($equipos){
        $smarty = new Smarty();
        $smarty->assign('Titulo',"Tabla Equpos");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('equipos',$equipos);
        $smarty->display('templates/teamsTable.tpl');
    }

    public function displayPlayers($players){
          $smarty = new Smarty();
          $smarty->assign('Titulo',"Tabla Jugadores");
          $smarty->assign('BASE_URL',BASE_URL);
          $smarty->assign('players',$players);
          $smarty->display('templates/playersTable.tpl');
      }

  public function editTeam  ($equipo){
        $smarty = new Smarty();
        $smarty->assign('Titulo',"EditarEquipo");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('equipo',$equipo);
        $smarty->display('templates/editTeam.tpl');
  }
}
