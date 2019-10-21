<?php
require_once("./model/TeamsModel.php");
require_once("./model/PlayersModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class ApiNbaController extends ApiController{

    public function getTeams($params = null) {
        $teams = $this->teamsModel->getTeams();
        $this->view->response($teams, 200);
    }

    public function getTeam($params = null) {
        $id = $params[':ID'];
        $team = $this->teamsModel->getTeam($id);
        if ($team) {
            $this->view->response($team, 200);
        } else {
            $this->view->response("No existe el equipo con el id={$id}", 404);
        }
    }

    public function deleteTeam($params = []) {
        $id = $params[':ID'];
        $team = $this->teamsModel->getTeam($id);

        if ($team) {
            $this->teamsModel->deleteTeam($id);
            $this->view->response("Equipo id=$id eliminado con exito", 200);
        }
        else
            $this->view->response("Equipo id=$id not found", 404);
    }

   public function addTeam($params = []) {
        $body = $this->getData();
        $nombre_equipo = $body->nombre_equipo;
        $partidos_ganados = $body->partidos_ganados;
        $partidos_perdidos = $body->partidos_perdidos;
        $team = $this->teamsModel->InsertTeam($nombre_equipo,$partidos_ganados,$partidos_perdidos);
    }

    public function updateTeam($params = []) {
        $id = $params[':ID'];
        $team = $this->teamsModel->getTeam($id);

        if ($team) {
            $body = $this->getData();
            $nombre_equipo = $body->nombre_equipo;
            $partidos_ganados = $body->partidos_ganados;
            $partidos_perdidos = $body->partidos_perdidos;
            $team = $this->teamsModel->updateTeam($id,$nombre_equipo, $partidos_ganados, $partidos_perdidos);
            $this->view->response("Equipo id=$id actualizado con éxito", 200);
        }
        else
            $this->view->response("Team id=$id not found", 404);
    }

    public function getPlayers($params = null) {
        $players = $this->playersModel->getPlayers();
        $this->view->response($players, 200);
    }

    public function getPlayer($params = null) {
        $id = $params[':ID'];
        $player = $this->playersModel->getPlayer($id);
        if ($player) {
            $this->view->response($player, 200);
        } else {
            $this->view->response("No existe el jugador con el id={$id}", 404);
        }
    }

    public function deletePlayer($params = []) {
        $id = $params[':ID'];
        $player = $this->playersModel->getPlayer($id);

        if ($player) {
            $this->playersModel->deletePlayer($id);
            $this->view->response("Jugador id=$id eliminado con exito", 200);
        }
        else
            $this->view->response("Jugador id=$id not found", 404);
    }

    public function addPlayer($params = []) {
        $body = $this->getData();
        $nombre_jugador = $body->nombre_jugador;
        $procedencia = $body->procedencia;
        $id_equipo = $body->id_equipo;
        $player = $this->playersModel->insertPlayer($nombre_jugador,$procedencia,$id_equipo);
    }

    public function updatePlayer($params = []) {
        $id = $params[':ID'];
        $player = $this->playersModel->getPlayer($id);

        if ($player) {
            $body = $this->getData();
            $body = $this->getData();
            $nombre_jugador = $body->nombre_jugador;
            $procedencia = $body->procedencia;
            $id_equipo = $body->id_equipo;
            $player = $this->playersModel->updatePlayer($id,$nombre_jugador,$procedencia,$id_equipo);
            $this->view->response("jugador id=$id actualizado con éxito", 200);
        }
        else
            $this->view->response("jugador id=$id not found", 404);
    }
}
