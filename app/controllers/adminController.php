<?php 
    require_once './app/views/adminView.php';
    require_once './app/models/libroModel.php';
    require_once './app/models/autorModel.php';
    
    
    class AdminController {
        private $view;
        private $libroModel;
        private $autorModel;
        public function __construct() { 
            $this->view = new AdminView();
            $this->libroModel = new LibroModel();
            $this->autorModel = new AutorModel();
            
        }
        public function showAdmin(){
            $libros = $this->libroModel->getLibros();
            $autores = $this->autorModel->getAutores();
            $this->view->showAdmin($libros, $autores);
        }
        public function agregarLibro(){
            $this->libroModel->addLibro();
        }
        public function agregarAutor(){
            $this->autorModel->addAutor();
        }
        public function borrarLibro($id){
            $this->libroModel->removeLibro($id);
        }
        public function borrarAutor($id){
            $this->autorModel->removeAutor($id);
        }
        public function editarLibro($id){
            $libro = $this->libroModel->getLibro($id);
            $autores = $this->autorModel->getAutores();
            $this->view->editarLibro($libro, $autores);
        }
        public function editarAutor($id){
            $autor = $this->autorModel->getAutor($id);
            $this->view->editarAutor($autor);
        }
        public function editarLibroAceptado($id){
            $this->libroModel->editarLibroAceptado($id);
        }
        public function editarAutorAceptado($id){
            $this->autorModel->editarAutorAceptado($id);
        }
    }