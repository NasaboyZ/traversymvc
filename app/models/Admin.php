<?php
class Admin {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function insertAdmin($data) {
        $this->db->query('INSERT INTO admin (username, password, created_at, anrede, firstname, secondName, agb, email) VALUES (:username, :password, :created_at, :anrede, :firstname, :secondName, :agb, :email)');

        // Bind values
        $this->db->bind(':username', $data['nutzername']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT)); // Hash the password before saving
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));
        $this->db->bind(':anrede', $data['anrede']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':secondName', $data['secondName']);
        $this->db->bind(':agb', $data['agb'] === 'accepted' ? 1 : 0);
        $this->db->bind(':email', $data['email']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
