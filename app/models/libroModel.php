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

            $autor = $query2-> fetchAll(PDO::FETCH_OBJ);
            //Donde esta la ID del autor en libro, lo remplazamos por su nombre y apellido ,ya que la clave foranea no la queremos
            $libro -> Autor = $autor[0]->Nombre . " " . $autor[0]->Apellido;
        }

        return $libros;
    }

    function getLibro($id){
        $query = $this->db->prepare('SELECT * FROM libros WHERE ID = ?');
        $query->execute([$id]);

        $libro = $query->fetchAll(PDO::FETCH_OBJ);
        $query2 = $this->db->prepare('SELECT * FROM autores WHERE ID = ?');
           
        $query2-> execute([$libro[0] -> Autor]);

        $autor = $query2-> fetchAll(PDO::FETCH_OBJ);
        //Donde esta la ID del autor en libro, lo remplazamos por su nombre y apellido ,ya que la clave foranea no la queremos
        $libro[0] -> Autor = $autor[0]-> Nombre . " " . $autor[0]->Apellido;
                
        return $libro;
    }
    
    function getLibrosAutor($id){
        $query = $this->db->prepare('SELECT * FROM libros WHERE Autor = ?');
        $query->execute([$id]);
        $libros = $query->fetchAll(PDO::FETCH_OBJ);
        $query2 = $this->db->prepare('SELECT * FROM autores WHERE ID = ?');
        
        $query2-> execute([$id]);

        $autor = $query2-> fetchAll(PDO::FETCH_OBJ);
        foreach ($libros as $libro) {
            $libro -> Autor = $autor[0]-> Nombre . " " . $autor[0]->Apellido;
        }
        return $libros;
    }
    
    function removeLibro($id){
        $query = $this->db->prepare("DELETE FROM libros WHERE `libros`.`ID` = ?");
        $query-> execute([$id]); 
        header('Location: ' . BASE_URL . 'administration');
    }
    
    function addLibro(){
        $query = $this->db->prepare('INSERT INTO `libros` (`Nombre`, `Genero`, `Autor`, `Editorial`, `Foto`) VALUES
        (?, ? , ? , ? , ?)');
        $query-> execute([$_POST["Nombre"],$_POST["Genero"],$_POST["Autor"],$_POST["Editorial"],$_POST["Foto"]]); 
        header('Location: ' . BASE_URL . 'administration');
    }
    function editarLibroAceptado($id){
        $query = $this->db->prepare("UPDATE `libros` SET Nombre = ?, Genero = ?, Autor = ?, Editorial = ?, Foto = ? WHERE `libros`.`ID` = ?");
        $query->execute([$_POST["Nombre"], $_POST["Genero"], $_POST["Autor"], $_POST["Editorial"], $_POST["Foto"], $id]);
        header('Location: ' . BASE_URL . 'administration');
    }
}