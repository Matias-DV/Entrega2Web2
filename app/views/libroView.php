<?php 
    class LibroView {
        public function showLibros($resultado){
            require 'templates/libros.phtml';
        }

        public function showLibro($resultado){
            require 'templates/libro.phtml';
        }
    }
