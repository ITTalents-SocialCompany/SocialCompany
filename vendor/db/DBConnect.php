<?php
class DBConnect{
    private $db;
    public function __construct(){
        $this->db = new PDO(DNS, DB_USER, DB_PASS);
    }

    public function getInstance() {
        return $this->db;
    }
}