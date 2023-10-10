<?php
    require_once './app/views/libroView.php';
    require_once './app/models/libroModel.php';

class LibroController {
    private $model;
    private $view;

    public function __construct() { 
        $this->model = new LibroModel();
        $this->view = new LibroView();
    }
    public function showLibros(){
         // obtengo tareas del controlador
         $libros = $this->model->getLibros();
        
         // muestro las tareas desde la vista
         $this->view->showLibros($libros);
 
    }
    public function showLibro($libro){

   }
}