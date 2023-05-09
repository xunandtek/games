<?php 

class Database {
    private $host;
    private $user;
    private $pass;
    private $db;

    public function __construct() {
        $this->user = "root";
        $this->host = "localhost";
        $this->pass = "";
        $this->db = "gamers";
    }

    public function getConnection(){

    }
}

?>