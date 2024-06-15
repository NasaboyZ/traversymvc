<?php

class AdminModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findUserByUsername($username) {
        $this->db->query('SELECT * FROM admin WHERE username = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        return $this->db->rowCount() > 0;
    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM admin WHERE username = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        if ($row) {
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getCurrentEvent() {
        $this->db->query('SELECT * FROM events WHERE is_active = 1 ORDER BY date DESC LIMIT 1');
        $row = $this->db->single();
        return $row ? $row : false;
    }

    public function addEvent($title, $description, $date) {
        $this->db->query('INSERT INTO events (title, description, date, is_active) VALUES (:title, :description, :date, 1)');
        $this->db->bind(':title', $title);
        $this->db->bind(':description', $description);
        $this->db->bind(':date', $date);
        return $this->db->execute();
    }

    public function updateEvent($title, $description, $date) {
        $this->db->query('UPDATE events SET title = :title, description = :description, date = :date WHERE is_active = 1');
        $this->db->bind(':title', $title);
        $this->db->bind(':description', $description);
        $this->db->bind(':date', $date);
        return $this->db->execute();
    }

    public function getAllEvents() {
        $this->db->query('SELECT * FROM events ORDER BY date DESC');
        return $this->db->resultSet();
    }
}
?>
