<?php

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new PDO(
            "mysql:host=".MYSQL_HOST .
            ";dbname=".MYSQL_DB.";charset=utf8", 
            MYSQL_USER, MYSQL_PASS);
    }

    public function getUserByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    public function registerUser($email, $name, $password) {
        $query = $this->db->prepare("INSERT INTO usuarios (email, nombre, password) VALUES (?, ?, ?)");
        $query->execute([$email, $name, $password]);
    }

    public function updatePassword($email, $password) {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $query = $this->db->prepare("UPDATE usuarios SET password = ? WHERE email = ?");
        return $query->execute([$passwordHashed, $email]);
    }
}




