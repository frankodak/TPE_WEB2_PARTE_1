<?php

class GeneroModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=milenio_db;charset=utf8', 'root', '');
    }

    public function getGeneros() {
        $query = $this->db->prepare('SELECT * FROM generos');
        $query->execute();

        $generos = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $generos;
    }

    public function getGenero($id) {    
        $query = $this->db->prepare('SELECT * FROM generos WHERE id = ?');
        $query->execute([$id]);   
    
        $generosId = $query->fetch(PDO::FETCH_OBJ);
    
        return $generosId;
    }

    public function getGeneroNombre($genero_id) {
        $query = $this->db->prepare('SELECT nombre FROM generos WHERE id = ?');
        $query->execute([$genero_id]);

        $genero = $query->fetch(PDO::FETCH_OBJ);

        return $genero ? $genero->nombre : 'Desconocido';
    }

    public function insertGenero($nombre) { 
        $query = $this->db->prepare('INSERT INTO generos(nombre) VALUES (?)');
        $query->execute([$nombre]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }

}