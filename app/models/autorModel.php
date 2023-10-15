<?php
require_once 'app/models/model.php';

class AutorModel  extends Model {

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