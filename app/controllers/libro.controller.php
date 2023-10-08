<?php
require_once './app/view/autor.view.php';
require_once './app/view/libro.view.php';
require_once './app/models/autor.model.php';
require_once './app/models/libro.model.php';

class LibroController {
    private $model;
    private $view;

    public function __construct() {
        // verifico logueado
        AuthHelper::verify();

        $this->model = new TaskModel();
        $this->view = new TaskView();
    }
    public function showLibros(){
         // obtengo tareas del controlador
         $libros = $this->model->getLibros();
        
         // muestro las tareas desde la vista
         $this->view->showTasks($libros);
 
    }
}