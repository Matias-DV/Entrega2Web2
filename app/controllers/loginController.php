<?php
require_once './app/views/loginView.php';
require_once './app/models/userModel.php';
require_once './app/helpers/auth.helper.php';

class LoginController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new UserModel();
        $this->view = new LoginView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function auth() {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        if (empty($usuario) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        $user = $this->model->getByUser($usuario);
        if ($user && password_verify($password, $user-> Password)) {
            AuthHelper::login($user);
            
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}
