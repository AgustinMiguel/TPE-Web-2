<?php
require_once "./model/UserModel.php";
require_once "./view/LoginView.php";

class LoginController {

    private $model;
    private $view;

	function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
    }

    public function startSesion(){
        $password = $_POST['password'];
        $usuario = $this->model->GetPassword($_POST['user']);
        if (isset($usuario) && $usuario != null && password_verify($password, $usuario->password)){
            session_start();
            $_SESSION['user'] = $usuario->usuario;
            $_SESSION['userId'] = $usuario->id;
            header("Location: " . URL_TABLE);
        }else{
            header("Location: " . URL_BASE);
        }
       // header("Location: " . BASE_URL);
    }

    public function Login(){
        $this->view->DisplayLogin();
    }

    public function Logout(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }
}
