<?php

class ProductsController
{
    private $db;
    private $productsDAO;

    public function products()
    {
        require_once '../app/model/icecream.php';
        require_once '../app/dao/productsDAO.php';
        require_once '../app/model/database.php';
        $database = new MySQLDatabase();
        $this->db = $database->connect();
        $this->productsDAO = new ProductsDAO($this->db);

        $productList = $this->productsDAO->getProducts();



        require_once '../app/views/products.php';
    }
}
