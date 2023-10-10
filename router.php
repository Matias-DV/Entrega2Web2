<?php
require_once ('./app/controllers/autorController.php');
require_once ('./app/controllers/libroController.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'libros'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) { 
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
        $controller = new AutorController();
        if (isset($params[1])){
            $controller->showAutor($params[1]);
            break;
        }
        else
            $controller->showAutor();
            break;
    default: 
        echo 'hola';
        break;
}
