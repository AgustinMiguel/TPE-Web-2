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
        $usuario = $this->model->getPassword($_POST['user']);

        if (isset($usuario) && $usuario != null && password_verify($password, $usuario->contraseña)){
            session_start();
            $_SESSION['user'] = $usuario->usuario;
            $_SESSION['userId'] = $usuario->id;
            header("Location: " . URL_ADMHOME);
        }else{
            header("Location: " . URL_LOGIN);
        }
    }

    public function login(){
        $this->view->DisplayLogin();
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
        }
    }
