<?php

class ProductsController
{
    private $db;
    private $productsDAO;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function products()
    {
        require_once '../app/model/product.php';
        require_once '../app/dao/productsDAO.php';

        $this->productsDAO = new ProductsDAO($this->db);
        $productList = $this->productsDAO->getProducts();

        require_once '../app/views/products.php';
    }
}
