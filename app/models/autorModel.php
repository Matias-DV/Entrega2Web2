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
    
    function addAutor($nombre,$apellido,$edad,$nacionalidad,$foto){
        $query = $this->db->prepare('INSERT INTO `autores` (`Nombre`, `Apellido`, `Edad`, `Nacionalidad`, `Foto`) VALUES
        (?, ? , ? , ? , ?)');
        $query-> execute([$nombre,$apellido,$edad,$nacionalidad,$foto]); 
        
    }

    function removeAutor($id){
        $query = $this->db->prepare("DELETE FROM autores WHERE `autores`.`ID` = ?");
        $query-> execute([$id]); 
    }
    
    function editarAutorAceptado($id,$nombre,$apellido,$edad,$nacionalidad,$foto){
        $query = $this->db->prepare("UPDATE `autores` SET Nombre = ?, Apellido = ?, Edad = ?, Nacionalidad = ?, Foto = ? WHERE `autores`.`ID` = ?");
        $query->execute([$nombre, $apellido, $edad, $nacionalidad, $foto, $id]);
    }
}