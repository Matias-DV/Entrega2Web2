<?php 
    class LibroView {
        public function showLibros($libros){
            require 'templates/libro.phtml';
        }

        public function showLibro($libro){
            require 'templates/libro.phtml';
        }
    }
