<?php

class AdminModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Methode zum Finden eines Benutzers anhand des Benutzernamens
    public function findUserByUsername($username) {
        $this->db->query('SELECT * FROM admin WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Methode zum Einloggen eines Benutzers
    public function login($username, $password) {
        $this->db->query('SELECT * FROM admin WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        if ($row) {
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row; // Benutzerobjekt zurückgeben
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>
