<?php 
    require_once './app/views/adminView.php';
    require_once './app/controllers/libroController.php';
    require_once './app/controllers/autorController.php';
    require_once './app/controllers/loginController.php';
    
    //acomodar y delegar todo lo que tenga que ver con libro y autor a sus respectivos controllers y model
    //aca solo se maneja administracion.
    
    class AdminController {
        private $view;
        private $libroController;
        private $autorController;
        private $loginController;
        public function __construct() { 
            $this->view = new AdminView();
            $this->libroController = new LibroController();
            $this->autorController = new AutorController();
            $this->loginController = new LoginController();
        }
        public function showAdmin($error = null){
            if(isset($_SESSION['Usuario'])){
                $libros = $this -> libroController -> getLibros();
                $autores = $this -> autorController -> getAutores();
                $this -> view -> showAdmin($libros, $autores,$error);
            }else{
                $this -> loginController -> showLogin(); 
            }
        }
    }