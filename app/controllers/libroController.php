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
         $resultado = $this->model->getLibros();
        
         $this->view->showLibros($resultado);
    }
    public function showLibro($id){
        $libro = $this->model->getLibro($id);

        $this->view->showLibro($libro);
   }
   public function showLibrosAutor($id){
        $libro = $this->model->getLibrosAutor($id);

        $this->view->showLibros($libro);
   }
}