<?php

class AutorModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    function getAutores() {
        $query = $this->db->prepare('SELECT * FROM autores');
        $query->execute();

        $autores = $query->fetchAll(PDO::FETCH_OBJ);
        return $autores;
    }
    function getAutor($id) {
        $query = $this->db->prepare('SELECT * FROM autores WHERE ID = ?');
        $query->execute([$id]);
        $autor = $query->fetchAll(PDO::FETCH_OBJ);

        $query = $this->db->prepare('SELECT * FROM libros WHERE Autor = ?');
        $query->execute([$id]);
        $libros = $query->fetchAll(PDO::FETCH_OBJ);
        $resultado = [$autor[0], $libros];
        return $resultado;
    }
}