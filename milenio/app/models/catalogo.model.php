<?php

class CatalogoModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=milenio_db;charset=utf8', 'root', '');
    }
 
    public function getLibros() {
        $query = $this->db->prepare('SELECT * FROM libros');
        $query->execute();

        $libros = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $libros;
    }

 
    public function getLibro($id) {    
        $query = $this->db->prepare('SELECT * FROM libros WHERE id_libro = ?');
        $query->execute([$id]);   
    
        $libros = $query->fetch(PDO::FETCH_OBJ);
    
        return $libros;
    }

    public function getGeneros() {
        $query = $this->db->prepare('SELECT DISTINCT genero FROM libros');
        $query->execute();
    
        $generos = $query->fetchAll(PDO::FETCH_COLUMN);
        
        return $generos;
    }
 
    public function insertLibro($nombre, $autor, $resena, $genero) { 
        $query = $this->db->prepare('INSERT INTO libros(nombre, autor, resena, genero) VALUES (?, ?, ?, ?)');
        $query->execute([$nombre, $autor, $resena, $genero]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
 
    public function eraseLibro($id) {
        $query = $this->db->prepare('DELETE FROM libros WHERE id_libro = ?');
        $query->execute([$id]);
    }

    
}