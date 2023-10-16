<?php 
    require_once './app/views/adminView.php';
    require_once './app/models/libroModel.php';
    class AdminController {
        private $view;
        private $libroModel;
        
        public function __construct() { 
            $this->view = new AdminView();
            $this->libroModel = new LibroModel();
            $this->autorModel = new AutorModel();
            
        }
        public function showAdmin(){
            $resultado = $this->libroModel->getLibros();
            
            $this->view->showAdmin($resultado);
        }
    }