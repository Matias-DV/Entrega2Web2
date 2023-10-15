<?php
require_once 'app/models/model.php';

class LibroModel  extends Model {

    function getLibros() {
        $query = $this->db->prepare('SELECT * FROM libros');
        $query-> execute();

        $libros = $query-> fetchAll(PDO::FETCH_OBJ);

        foreach ($libros as $libro) {
            $query2 = $this->db->prepare('SELECT * FROM autores WHERE ID = ?');
           
            $query2-> execute([$libro -> Autor]);

            $autores = $query2-> fetchAll(PDO::FETCH_OBJ);
        }

        $resultado = [$libros, $autores];
        return $resultado;
    }

    function getLibro($id){
        $query = $this->db->prepare('SELECT * FROM libros WHERE ID = ?');
        $query->execute([$id]);

        $libro = $query->fetchAll(PDO::FETCH_OBJ);
        $query2 = $this->db->prepare('SELECT * FROM autores WHERE ID = ?');
           
        $query2-> execute([$libro[0] -> Autor]);

        $autor = $query2-> fetchAll(PDO::FETCH_OBJ);
        $resultado = [$libro[0], $autor[0]];
        return $resultado;
    }
    
    function getLibrosAutor($id){
        $query = $this->db->prepare('SELECT * FROM libros WHERE Autor = ?');
        $query->execute([$id]);

        $libros = $query->fetchAll(PDO::FETCH_OBJ);
        $query2 = $this->db->prepare('SELECT * FROM autores WHERE ID = ?');
           
        $query2-> execute([$id]);

        $autores = $query2-> fetchAll(PDO::FETCH_OBJ);
        $resultado = [$libros, $autores];
        return $resultado;
    }

}