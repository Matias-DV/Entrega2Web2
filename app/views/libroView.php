<?php 
    class LibroView {
        public function showLibros($libros){
            require 'templates/libros.phtml';
        }

        public function showLibro($libro){
            require 'templates/libro.phtml';
        }
        public function editarLibro($libro, $autores, $error){
            require 'templates/editarLibro.phtml';
        }
    }
