<?php

class GeneroModel {
    private $db;

    public function __construct() {
        $this->db = new PDO(
            "mysql:host=".MYSQL_HOST .
            ";dbname=".MYSQL_DB.";charset=utf8", 
            MYSQL_USER, MYSQL_PASS);
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

    public function getGeneroPorNombre($nombre) {
        $query = $this->db->prepare('SELECT * FROM generos WHERE nombre = ?');
        $query->execute([$nombre]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getGeneroDetallePorNombre($nombre) {
        $query = $this->db->prepare('SELECT * FROM generos WHERE nombre = ?');
        $query->execute([$nombre]);
        
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertGenero($nombre, $descripcion) { 
        $query = $this->db->prepare('INSERT INTO generos(nombre, descripcion) VALUES (?, ?)');
        $query->execute([$nombre, $descripcion]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }   

    public function editGenero($id, $nombre, $descripcion) {
        $query = $this->db->prepare('
            UPDATE generos 
            SET nombre = ?, descripcion = ? 
            WHERE id = ?
        ');
        $query->execute([$nombre, $descripcion, $id]);
    }

    public function deleteGenero($id) {
        $query = $this->db->prepare('
            DELETE FROM generos WHERE id = ?
        ');
        $query->execute([$id]);
    }

    
}