<?php
    require_once './app/controllers/autorController.php';
    require_once './app/controllers/libroController.php';
    require_once './app/controllers/loginController.php';
    require_once './app/controllers/errorController.php';
    require_once './app/controllers/adminController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//Para mantener la session iniciada, antes de manejar los datos
AuthHelper::init();

$action = 'libros';
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'administration':
        if(isset($_SESSION['Usuario'])){
            if(isset($params[1])){
                if ($params[1] == 'borrarLibro'){
                    if(isset($params[2])){
                        $controller = new AdminController();
                        $controller->borrarLibro($params[2]);
                        break;
                    }else{
                        $controller = new ErrorController();
                        $controller->show404();
                        break;  
                    }
                }
                else if($params[1] == 'editarLibro'){
                    if(isset($params[2])){
                        $controller = new AdminController();
                        $controller->editarLibro($params[2]);
                        break;
                    } else {
                        $controller = new ErrorController();
                        $controller->show404();
                        break;  
                    }
                }
                else if($params[1] == 'editLibroAceptado'){
                    if(isset($params[2])){
                        $controller = new AdminController();
                        $controller->editarLibroAceptado($params[2]);
                        break;
                    } else {
                        $controller = new ErrorController();
                        $controller->show404();
                        break;  
                    }
                }

                if ($params[1] == 'borrarAutor'){
                    if(isset($params[2])){
                        $controller = new AdminController();
                        $controller->borrarAutor($params[2]);
                        break;
                    }else{
                        $controller = new ErrorController();
                        $controller->show404();
                        break;  
                    }
                }
                else if($params[1] == 'editarAutor'){
                    if(isset($params[2])){
                        $controller = new AdminController();
                        $controller->editarAutor($params[2]);
                        break;
                    } else {
                        $controller = new ErrorController();
                        $controller->show404();
                        break;  
                    }
                }
                else if($params[1] == 'editAutorAceptado'){
                    if(isset($params[2])){
                        $controller = new AdminController();
                        $controller->editarAutorAceptado($params[2]);
                        break;
                    } else {
                        $controller = new ErrorController();
                        $controller->show404();
                        break;  
                    }
                }
                else{
                    $controller = new ErrorController();
                    $controller->show404();
                    break;
                }
            }
            else{
                $controller = new AdminController();
                $controller->showAdmin();
                break;
            }
        }else{
            $controller = new LoginController();
            $controller->showLogin(); 
            break; 
        }
    case'agregarLibro':
        if(isset($_SESSION['Usuario'])){
            $controller = new AdminController();
            $controller->agregarLibro();
            break;
        }else{
            $controller = new LoginController();
            $controller->showLogin(); 
            break; 
        }
    case'agregarAutor':
        if(isset($_SESSION['Usuario'])){
            $controller = new AdminController();
            $controller->agregarAutor();
            break;
        }else{
            $controller = new LoginController();
            $controller->showLogin(); 
            break; 
        }
    case 'login':
        $controller = new LoginController();
        $controller->showLogin(); 
        break;
    case 'auth':
        $controller = new LoginController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new LoginController();
        $controller->logout();
        break;
    case 'libros':
        $controller = new LibroController();
        if (isset($params[1])){
            $controller->showLibro($params[1]);
            break;
        }
        else
            $controller->showLibros();
            break;
    case 'autores':
        if (isset($params[1])){
            $controller = new LibroController();
            $controller->showLibrosAutor($params[1]);
            break;
        }
        else
            $controller = new AutorController();
            $controller->showAutores();
            break;
    default: 
        $controller = new ErrorController();
        $controller->show404();
        break;
}
