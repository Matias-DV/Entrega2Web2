<?php 
    class AdminView {
        public function showAdmin($libros, $autores){
            require 'templates/administration.phtml';
        }
        public function editarLibro($libro, $autores){
            require 'templates/editarLibro.phtml';
        }
        public function editarAutor($autor){
            require 'templates/editarAutor.phtml';
        }
    }