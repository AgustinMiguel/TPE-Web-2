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

  public function displayTeams($equipos, $login){
        $smarty = new Smarty();
        $smarty->assign('Titulo',"Tabla Equpos");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('login',$login);
        $smarty->assign('equipos',$equipos);
        $smarty->display('templates/teamsTable.tpl');
    }

    public function displayPlayers($players,$login){
          $smarty = new Smarty();
          $smarty->assign('Titulo',"Tabla Jugadores");
          $smarty->assign('BASE_URL',BASE_URL);
          $smarty->assign('players',$players);
          $smarty->assign('login',$login);
          $smarty->display('templates/playersTable.tpl');
      }
    public function displayTeamPlayers($players, $login){
        $smarty = new Smarty();
        $smarty->assign('Titulo',"Tabla Jugadores");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('players',$players);
        $smarty->assign('login',$login);
        $smarty->display('templates/playersTeamTable.tpl');
    }

    public function displayOrderedPlayers($players){
        $smarty = new Smarty();
        $smarty->assign('Titulo',"Tabla Jugadores ordenados");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('players',$players);
        $smarty->display('templates/orderedPlayers.tpl');
    }

    public function editTeam  ($equipo){
        $smarty = new Smarty();
        $smarty->assign('Titulo',"EditarEquipo");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('equipo',$equipo);
        $smarty->display('templates/editTeam.tpl');
  }

    public function editPlayer  ($player){
      $smarty = new Smarty();
      $smarty->assign('Titulo',"EditarJugador");
      $smarty->assign('BASE_URL',BASE_URL);
      $smarty->assign('player',$player);
      $smarty->display('templates/editPlayer.tpl');
}
public function showPlayer  ($player, $login){
  $smarty = new Smarty();
  $smarty->assign('Titulo',"Jugador");
  $smarty->assign('BASE_URL',BASE_URL);
  $smarty->assign('player',$player);
  $smarty->assign('login',$login);
  $smarty->display('templates/showPlayer.tpl');
}
}
