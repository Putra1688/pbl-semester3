<?php
class User {
    private $db;
    private $table = 'users';

    public function __construct() {
        $this->db = new Database;
    }

    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function createUser($data) {
        $query = "INSERT INTO " . $this->table . " (name, email, password, role) 
                 VALUES (:name, :email, :password, :role)";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind('role', $data['role']);

        return $this->db->execute();
    }
}