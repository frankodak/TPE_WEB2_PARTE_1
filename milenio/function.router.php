<?php

    function showHome(){
        include_once 'templates/layout/header.phtml';
        include_once 'templates/generos.phtml';
        include_once 'templates/catalogo.phtml';
        include_once 'templates/layout/footer.phtml';
    }

    function showLogin(){
        include_once 'templates/login.phtml';
        include_once 'templates/layout/footer.phtml';
    }

    function showDetail($id){
        include_once 'templates/layout/header.phtml';
        include_once 'templates/detail.phtml';
        include_once 'templates/layout/footer.phtml';
    }

    function showAddCatalogo(){
        include_once 'templates/layout/header.phtml';
        include_once 'templates/addCatalogo.phtml';
        include_once 'templates/layout/footer.phtml';
    }

    function showError(){
        include_once 'templates/layout/header.phtml';
        include_once 'templates/layout/error.phtml';
        include_once 'templates/layout/footer.phtml';
    }