<?php
require_once("./model/TeamsModel.php");
require_once("./model/PlayersModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class TareasApiController extends ApiController{

    public function getTeams($params = null) {
        $teams = $this->model->getTeams();
        $this->view->response($teams, 200);
    }

    public function getTeam($params = null) {
        $id = $params[':ID'];
        $team = $this->teamsModel->GetTeam($id);

        if ($team) {
            $this->view->response($team, 200);
        } else {
            $this->view->response("No existe el equipo con el id={$id}", 404);
        }
    }

    public function deleteTeam($params = []) {
        $id = $params[':ID'];
        $team = $this->teamsModel->GetTeam($id);

        if ($team) {
            $this->teamsModelmodel->deleteTeam($id);
            $this->view->response("Equipo id=$id eliminado con éxito", 200);
        }
        else
            $this->view->response("Equipo id=$id not found", 404);
    }

    // TareaApiController.php
   public function addTeam($params = []) {
        $body = $this->getData();
        $nombre_equipo = $body->nombre_equipo;
        $partidos_ganados = $body->partidos_ganados;
        $partidos_perdidos = $body->partidos_perdidos;
        $team = $this->teamsModel->InsertTeam($nombre_equipo,$partidos_ganados,$partidos_perdidos);
    }

    public function updateTeam($params = []) {
        $id = $params[':ID'];
        $team = $this->teamsModel->GetTeam($id);

        if ($team) {
            $body = $this->getData();
            $nombre_equipo = $body->nombre_equipo;
            $partidos_ganados = $body->partidos_ganados;
            $partidos_perdidos = $body->partidos_perdidos;
            $team = $this->teamsModel->updateTeam($nombre_equipo, $partidos_ganados, $partidos_perdidos);
            $this->view->response("Equipo id=$id actualizado con éxito", 200);
        }
        else
            $this->view->response("Team id=$id not found", 404);
    }


}
