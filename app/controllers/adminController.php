<?php

class AdminController
{
    private $db;
    private $icecreamDAO;
    private $newsDAO;

    public function index()
    {
        $this->admin();
    }

    public function admin()
    {
        require_once '../app/model/database.php';

        require_once '../app/model/icecream.php';
        require_once '../app/dao/icecreamDAO.php';
        $database = new MySQLDatabase();
        $this->db = $database->connect();
        $this->icecreamDAO = new IcecreamDAO($this->db);

        $icecreamList = $this->icecreamDAO->getIcecreams();

        // require_once '../app/model/news.php';
        // require_once '../app/dao/newsDAO.php';
        // $this->newsDAO = new NewsDAO($this->db);
        // $newerNews = $this->newsDAO->getNews();

        require_once '../app/views/admin.php';
    }
}
