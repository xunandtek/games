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
        $this->db   = "gamers";
    }

    public function getConnection(){
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if($conn->connect_error) {
            die("Connection Failed: ". $conn->connect_error);
        }

        return $conn;
    }
}

?>