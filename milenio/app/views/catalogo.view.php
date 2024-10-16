<?php

class CatalogoView {
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function showLibros($generos, $libros) {
        include_once 'templates/layout/header.phtml';
        include_once 'templates/generos.phtml';
        include_once 'templates/catalogo.phtml';
        include_once 'templates/layout/footer.phtml';
    }

    public function showDetail($libro) {
        include_once 'templates/detail.phtml';
    }

    public function showError($error) {
        require 'templates/layout/error.phtml';
    }

}