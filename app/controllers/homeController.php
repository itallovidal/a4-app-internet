<?php

class HomeController
{
    private $db;
    private $productsDAO;

    public function home()
    {
        require_once '../app/model/product.php';
        require_once '../app/dao/productsDAO.php';
        require_once '../app/model/database.php';
        $database = new MySQLDatabase();
        $this->db = $database->connect();
        $this->productsDAO = new ProductsDAO($this->db);

        $newerProducts = $this->productsDAO->getProducts(3);

        require_once '../app/views/home.php';
    }
}
