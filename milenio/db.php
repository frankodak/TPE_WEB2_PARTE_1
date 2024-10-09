<?php

    $db = new PDO('mysql:host=localhost;dbname=milenio_db;charset=utf8', 'root', '');
    $query = $db->prepare('SELECT * FROM libros');
    $query->execute();
    $catalogo = $query->fetchAll(PDO::FETCH_ASSOC);

    $generos = [];
    foreach ($catalogo as $genero): 
        if (!in_array($genero['genero'], $generos)): 
            $generos[] = $genero['genero'];
        endif; 
    endforeach;



   

