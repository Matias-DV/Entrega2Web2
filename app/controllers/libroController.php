<?php
    require_once './app/views/libroView.php';
    require_once './app/models/libroModel.php';
    require_once './app/controllers/adminController.php';
    require_once './app/controllers/autorController.php';

    
class LibroController {
    private $model;
    private $view;
    private $loginController;
    public function __construct() { 
        $this->model = new LibroModel();
        $this->view = new LibroView();
        $this->loginController = new LoginController();
    }
    public function showLibros(){
        $resultado = $this->model->getLibros();
        $this->view->showLibros($resultado);
    }
    public function getLibros(){
        return $this -> model -> getLibros();
    }
    public function showLibro($id){
        $libro = $this->model->getLibro($id);

        $this->view->showLibro($libro);
   }
   public function showLibrosAutor($id){
        $libro = $this->model->getLibrosAutor($id);

        $this->view->showLibros($libro);
   }
   public function agregarLibro(){
       if(isset($_SESSION['Usuario'])){
            $nombre = trim($_POST["Nombre"]);
            $genero = trim($_POST["Genero"]);
            $autor = trim($_POST["Autor"]);
            $editorial = trim($_POST["Editorial"]);
            $foto = trim($_POST["Foto"]);
            if (empty($nombre) || empty($genero) || empty($autor) || empty($editorial)) {
                $controller = new AdminController();
                $controller->showAdmin('Falta completar datos en Agregar Libro');
            }else{
                $this->model->addLibro($nombre,$genero,$autor,$editorial,$foto);
                header('Location: ' . BASE_URL . 'administration');
            }
        }
        else{
            $this -> loginController -> showLogin(); 
        }
    }
    public function borrarLibro($id){
        if(isset($_SESSION['Usuario'])){
            $this->model->removeLibro($id);
            header('Location: ' . BASE_URL . 'administration');
        }
        else{
            $this -> loginController -> showLogin(); 
        }
    }
    public function editarLibro($id){
        if(isset($_SESSION['Usuario'])){
            $libro = $this->model->getLibro($id);
            $controller = new AutorController();
            $autores = $controller -> getAutores();
            $this->view->editarLibro($libro, $autores, null);
        }
        else{
            $this -> loginController -> showLogin(); 
        }
    }
    
    public function editarLibroAceptado($id){
        if(isset($_SESSION['Usuario'])){
            $nombre = trim($_POST["Nombre"]);
            $genero = trim($_POST["Genero"]);
            $autor = trim($_POST["Autor"]);
            $editorial = trim($_POST["Editorial"]);
            $foto = trim($_POST["Foto"]);
            if (empty($nombre) || empty($genero) || empty($autor) || empty($editorial)) {
                $libro = $this->model->getLibro($id);
                $controller = new AutorController();
                $autores = $controller -> getAutores();
                $this->view->editarLibro($libro, $autores,'Falta completar datos');
            }else{
                $this->model->editarLibroAceptado($id,$nombre,$genero,$autor,$editorial,$foto);
                header('Location: ' . BASE_URL . 'administration');
            }
        }
        else{
            $this -> loginController -> showLogin(); 
        }
    }
}