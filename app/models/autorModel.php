<?php

    echo"hola";

class AutorModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getAutor() {
        $query = $this->db->prepare('SELECT * FROM libros');
        $query->execute();

        // $tasks es un arreglo de tareas
        $libros = $query->fetchAll(PDO::FETCH_OBJ);

        return $libros;
    }
}