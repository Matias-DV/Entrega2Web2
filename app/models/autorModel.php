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

    function addAutor(){
        $query = $this->db->prepare('INSERT INTO `autores` (`Nombre`, `Apellido`, `Edad`, `Nacionalidad`, `Foto`) VALUES
        (?, ? , ? , ? , ?)');
        $query-> execute([$_POST["Nombre"],$_POST["Apellido"],$_POST["Edad"],$_POST["Nacionalidad"],$_POST["Foto"]]); 
        header('Location: ' . BASE_URL . 'administration');
    }

    function removeAutor($id){
        $query = $this->db->prepare("DELETE FROM autores WHERE `autores`.`ID` = ?");
        $query-> execute([$id]); 
        header('Location: ' . BASE_URL . 'administration');
    }

    function editarAutorAceptado($id){
        $query = $this->db->prepare("UPDATE `autores` SET Nombre = ?, Apellido = ?, Edad = ?, Nacionalidad = ?, Foto = ? WHERE `autores`.`ID` = ?");
        $query->execute([$_POST["Nombre"], $_POST["Apellido"], $_POST["Edad"], $_POST["Nacionalidad"], $_POST["Foto"], $id]);
        header('Location: ' . BASE_URL . 'administration');
    }
}