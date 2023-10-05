<?php
require_once './app/controllers/autor.controller.php';
require_once './app/controllers/libro.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'libros'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) { 
    case 'libros':
        if (isset($params[1]))
            showLibros($params[1]);
        else 
            showLibros();
    case 'autores':
        if (isset($params[1]))
            showAutores($params[1]);
        else 
            showAutores();
    default: 
        echo 'nada';
        break;
}
?>