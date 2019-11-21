<?php
require_once('libs/Smarty.class.php');

class PlayersView {
  function __construct(){
  }
public function displayPlayers($players,$login, $admin){
      $smarty = new Smarty();
      $smarty->assign('Titulo',"Tabla Jugadores");
      $smarty->assign('BASE_URL',BASE_URL);
      $smarty->assign('players',$players);
      $smarty->assign('login',$login);
      $smarty->assign('admin',$admin);
      $smarty->display('templates/playersTable.tpl');
  }
  public function editPlayer  ($player,$login,$admin){
    $smarty = new Smarty();
    $smarty->assign('Titulo',"EditarJugador");
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('player',$player);
    $smarty->assign('login',$login);
    $smarty->assign('admin',$admin);
    $smarty->display('templates/editPlayer.tpl');
}
public function showTeamPlayers($players,$login,$admin,$img){
    $smarty = new Smarty();
    $smarty->assign('Titulo',"Tabla Jugadores");
    $smarty->assign('BASE_URL',BASE_URL);
    $smarty->assign('players',$players);
    $smarty->assign('login',$login);
    $smarty->assign('img',$img);
    $smarty->assign('admin',$admin);
    $smarty->display('templates/showTeamPlayers.tpl');
}
public function showPlayer  ($player, $login, $admin, $img){
  $smarty = new Smarty();
  $smarty->assign('Titulo',"Jugador");
  $smarty->assign('BASE_URL',BASE_URL);
  $smarty->assign('player',$player);
  $smarty->assign('login',$login);
  $smarty->assign('img',$img);
  $smarty->assign('admin',$admin);
  $smarty->display('templates/showPlayer.tpl');
  }
}
