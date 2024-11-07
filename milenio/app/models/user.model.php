<?php

class UserModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=milenio;charset=utf8', 'root', '');
    }

    public function getUserByEmail($email) {    
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $query->execute([$email]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    public function updatePassword($email, $passwordHashed) {
        $query = $this->db->prepare("UPDATE usuarios SET password = ? WHERE email = ?");
        return $query->execute([$passwordHashed, $email]);
    }
}
