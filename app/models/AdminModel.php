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

    public function updateEvent($data) {
        $this->db->query('UPDATE events SET title = :title, description = :description, date = :date WHERE id = :id');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':id', $data['id']);
        return $this->db->execute();
    }

    
    public function deleteEvent($id) {
        $this->db->query('DELETE FROM events WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    
    public function getEventById($id) {
        $this->db->query('SELECT * FROM events WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    public function addFashionArtImage($title, $description, $filePath) {
        $this->db->query('INSERT INTO fashion_art (title, description, file_path, created_at) VALUES (:title, :description, :file_path, NOW())');
        $this->db->bind(':title', $title);
        $this->db->bind(':description', $description);
        $this->db->bind(':file_path', $filePath);
        
        return $this->db->execute();
    }
    public function getFashionArtImages() {
        $this->db->query('SELECT * FROM fashion_art ORDER BY created_at DESC');
        return $this->db->resultSet();
    }
    public function deleteFashionArtImage($id) {
        $this->db->query('DELETE FROM fashion_art WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    
    public function getAllEvents() {
        $this->db->query('SELECT * FROM events ORDER BY date DESC');
        return $this->db->resultSet();
    }
    // Insert the new admin into the database
    public function insertAdmin($data) {
        $this->db->query('INSERT INTO admin (username, password, created_at, anrede, firstname, secondName, agb, email) VALUES (:username, :password, :created_at, :anrede, :firstname, :secondName, :agb, :email)');
        $this->db->bind(':username', $data['nutzername']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));
        $this->db->bind(':anrede', $data['anrede']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':secondName', $data['secondName']);
        $this->db->bind(':agb', $data['agb']);
        $this->db->bind(':email', $data['email']);
        
        return $this->db->execute();
    }
}
?>
