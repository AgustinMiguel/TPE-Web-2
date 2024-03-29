<?php

abstract class ApiController {
    protected $teamsModel;
    protected $playersModel;
    protected $commentsModel;
    protected $view;
    private $data;

    public function __construct() {
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
        $this->teamsModel = new TeamsModel();
        $this->playersModel = new PlayersModel();
        $this->commentsModel = new CommentsModel();
    }

    function getData(){
        return json_decode($this->data);
    }
}
