<?php 
    class AdminView {
        public function showAdmin($libros, $autores,$error = null){
            require 'templates/administration.phtml';
        }
        
    }