<?php

    function showHome(){
        include_once 'templates/header.php';
        include_once 'templates/catalogo.php';
    }

    function showLogin(){
        include_once 'templates/login.php';
    }

    function showDetail($id){
        include_once 'templates/header.php';
        include_once 'templates/detail.php';
    }

    function showAddCatalogo(){
        include_once 'templates/header.php';
        include_once 'templates/addCatalogo.php';
    }