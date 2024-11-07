<?php

class LibroModel {
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
        $query = $this->db->prepare('SELECT * FROM libros WHERE id = ?');
        $query->execute([$id]);   
    
        $libros = $query->fetch(PDO::FETCH_OBJ);
    
        return $libros;
    }
 
    public function insertLibro($titulo, $autor, $reseña, $genero_nombre) { 
        $query = $this->db->prepare('INSERT INTO libros(titulo, autor, reseña, genero_nombre) VALUES (?, ?, ?, ?)');
        $query->execute([$titulo, $autor, $reseña, $genero_nombre]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
 
    public function eraseLibro($id) {
        $query = $this->db->prepare('DELETE FROM libros WHERE id = ?');
        $query->execute([$id]);
    }

}