<?php

class HomeController
{
    private $db;
    private $productsDAO;
    private $newsDAO;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function home()
    {
        require_once '../app/model/product.php';
        require_once '../app/dao/productsDAO.php';
        
        $this->productsDAO = new ProductsDAO($this->db);
        $newerProducts = $this->productsDAO->getProducts(3);

        require_once '../app/model/news.php';
        require_once '../app/dao/newsDAO.php';

        $this->newsDAO = new NewsDAO($this->db);
        $newerNews = $this->newsDAO->getNews(1);
        $news = $newerNews[0];

        require_once '../app/views/home.php';
    }
}
