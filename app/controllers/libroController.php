<?php
    require_once '/app/view/libro.view.php';
    require_once '/app/models/libro.model.php';

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