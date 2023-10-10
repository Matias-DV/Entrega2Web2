<?php

class LibroModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getLibros() {
        $query = $this->db->prepare('SELECT * FROM libros');
        $query->execute();

        // $tasks es un arreglo de tareas
        $libros = $query->fetchAll(PDO::FETCH_OBJ);

        return $libros;
    }
    function getLibro($id){
        $query = $this->db->prepare('SELECT * FROM libros WHERE ID = ?');
        $query->execute($id);

        // $tasks es un arreglo de tareas
        $libro = $query->fetchAll(PDO::FETCH_OBJ);

        return $libro;
    }
}