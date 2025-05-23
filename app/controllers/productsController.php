<?php

class ProductsController{
    private $db;
    private $icecreamDAO;

    public function products(){
        require_once '../app/model/icecream.php';
        require_once '../app/dao/icecreamDAO.php';
        require_once '../app/model/database.php';
        $database = new MySQLDatabase();
        $this->db = $database->connect();
        $this->icecreamDAO = new IcecreamDAO($this->db);

        $icecreamList = $this->icecreamDAO->getIcecreams();

        

        require_once '../app/views/products.php';
    }
}