<?php 
    class LibroView {
        public function showLibros($libros){
            require 'templates/libros.phtml';
        }

        public function showLibro($libro){
            require 'templates/libro.phtml';
        }
    }
