<?php

class Post {
    private $db;

    public function __construct() {
        $this->db = new mysqli("localhost", "root", "", "cms_sederhana");
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM post ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
