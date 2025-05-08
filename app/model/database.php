<?php

class MySQLDatabase {
    private $host = "localhost";
    private $port = "3306";
    private $database = "icecream_shop_db";
    private $user = "root";
    private $password = "";

    public function connect() {
        try {
            $conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->database", $this->user, $this->password);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}