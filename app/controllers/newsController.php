<?php

class NewsController
{
    private $db;

    private $icecreamDAO;

    private $newsDAO;

    public function index()
    {
        $this->news();
    }

    public function news()
    {
        require_once '../app/model/database.php';

        require_once '../app/model/icecream.php';
        require_once '../app/dao/icecreamDAO.php';
        $database = new MySQLDatabase();
        $this->db = $database->connect();
        $this->icecreamDAO = new IcecreamDAO($this->db);

        $newerIcecreams = $this->icecreamDAO->getIcecreams(2);


        require_once '../app/model/news.php';
        require_once '../app/dao/newsDAO.php';
        $this->newsDAO = new NewsDAO($this->db);

        $newerNews = $this->newsDAO->getNews();

        require_once '../app/views/news.php';
    }
}
