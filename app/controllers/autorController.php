<?php 
    require_once './app/models/autorModel.php';
    require_once './app/views/autorView.php';
    require_once './app/controllers/loginController.php';
    require_once './app/controllers/adminController.php';

    class AutorController {
        private $model;
        private $view;
        private $loginController;
        public function __construct() { 
            $this->model = new AutorModel();
            $this->view = new AutorView();
            $this->loginController = new LoginController();
        }

        public function getAutores(){
            return $this -> model -> getAutores();
        }

        public function showAutores(){
            $autores = $this->model->getAutores();
            
             $this->view->showAutores($autores);
        }
        public function showAutor($id){
            $autor = $this->model->getAutor($id);
           
            $this->view->showAutor($autor);
        }

        public function agregarAutor(){
            if(isset($_SESSION['Usuario'])){
                $nombre = trim($_POST["Nombre"]);
                $apellido = trim($_POST["Apellido"]);
                $edad = trim($_POST["Edad"]);
                $nacionalidad = trim($_POST["Nacionalidad"]);
                $foto = trim($_POST["Foto"]);
                if (empty($nombre) || empty($apellido) || empty($edad) || empty($nacionalidad)) {
                    $controller = new AdminController();
                    $controller->showAdmin('Falta completar datos en Agregar Autor');
                }else{
                    $this->model->addAutor($nombre,$apellido,$edad,$nacionalidad,$foto);
                    header('Location: ' . BASE_URL . 'administration');
                }
            }
            else{
                $this -> loginController -> showLogin(); 
            }
        }

        public function borrarAutor($id){
            if(isset($_SESSION['Usuario'])){
                $this->model->removeAutor($id);
                header('Location: ' . BASE_URL . 'administration');
            }
            else{
                $this -> loginController -> showLogin(); 
            }
        }

        public function editarAutor($id){
            if(isset($_SESSION['Usuario'])){
                $autor = $this-> model->getAutor($id);
                $this->view->editarAutor($autor,null);
            }
            else{
                $this -> loginController -> showLogin(); 
            }
        }

        public function editarAutorAceptado($id){
            if(isset($_SESSION['Usuario'])){
                $nombre = trim($_POST["Nombre"]);
                $apellido = trim($_POST["Apellido"]);
                $edad = trim($_POST["Edad"]);
                $nacionalidad = trim($_POST["Nacionalidad"]);
                $foto = trim($_POST["Foto"]);
                if (empty($nombre) || empty($apellido) || empty($edad) || empty($nacionalidad)) {
                    $this->view->editarAutor($id,'Falta completar datos');
                }else{
                    $this-> model->editarAutorAceptado($id,$nombre,$apellido,$edad,$nacionalidad,$foto);
                    header('Location: ' . BASE_URL . 'administration');
                }
            }
            else{
                $this -> loginController -> showLogin(); 
            }
        }
    }