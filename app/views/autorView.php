<?php 
    class AutorView {
        
        public function showAutores($autores){
            require 'templates/autores.phtml';
        }

        public function editarAutor($autor,$error){
            require 'templates/editarAutor.phtml';
        }
    }