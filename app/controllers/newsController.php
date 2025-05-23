<?php

class NewsController
{
    private $db;

    private $productsDAO;

    private $newsDAO;

    public function news()
    {
        require_once '../app/model/database.php';

        require_once '../app/model/product.php';
        require_once '../app/dao/productsDAO.php';
        $database = new MySQLDatabase();
        $this->db = $database->connect();
        $this->productsDAO = new ProductsDAO($this->db);

        $newerProducts = $this->productsDAO->getProducts(2);


        require_once '../app/model/news.php';
        require_once '../app/dao/newsDAO.php';
        $this->newsDAO = new NewsDAO($this->db);

        $newerNews = $this->newsDAO->getNews();

        require_once '../app/views/news.php';
    }
}
