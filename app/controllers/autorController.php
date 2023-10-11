<?php 
    require_once './app/models/autorModel.php';
    require_once './app/views/autorView.php';

    class AutorController {
        private $model;
        private $view;
    
        public function __construct() { 
            $this->model = new AutorModel();
            $this->view = new AutorView();
        }
        public function showAutores(){
            $autores = $this->model->getAutores();
            
             $this->view->showAutores($autores);
        }
        public function showAutor($id){
            $autor = $this->model->getAutor($id);
           
            $this->view->showAutor($autor);
       }
    }