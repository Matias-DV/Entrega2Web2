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
        public function showAutor(){
             // obtengo tareas del controlador
             $autores = $this->model->getAutor();
            
             // muestro las tareas desde la vista
             $this->view->showAutor($autores);
        }
    }