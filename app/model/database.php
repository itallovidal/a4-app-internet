<?php

class MySQLDatabase {
    private $host = "localhost";
    private $database = "icecream_shop_dp";
    private $user = "root";
    private $password = "";

    public function connect() {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}