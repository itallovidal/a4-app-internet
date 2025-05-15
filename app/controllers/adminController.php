<?php

class AdminController
{
    private $db;
    private $icecreamDAO;
    private $usersDAO;
    private $newsDAO;

    public function index()
    {
        header('Location: ' . base_url('admin/products'));
    }

    public function products()
    {
        $this->connectDatabase();

        require_once '../app/model/icecream.php';
        require_once '../app/dao/icecreamDAO.php';

        $this->icecreamDAO = new IcecreamDAO($this->db);
        $icecreamList = $this->icecreamDAO->getIcecreams();

        require_once '../app/views/admin/products.php';
    }

    public function news()
    {
        $this->connectDatabase();

        require_once '../app/model/news.php';
        require_once '../app/dao/newsDAO.php';

        $this->newsDAO = new NewsDAO($this->db);
        $NewsList = $this->newsDAO->getNews();

        require_once '../app/views/admin/news.php';
    }

    public function users()
    {
        $this->connectDatabase();

        require_once '../app/model/users.php';
        require_once '../app/dao/usersDAO.php';

        $this->usersDAO = new UsersDAO($this->db);
        $usersList = $this->usersDAO->getUsers();

        require_once '../app/views/admin/users.php';
    }

    public function connectDatabase()
    {
        require_once '../app/model/database.php';
        
        $database = new MySQLDatabase();
        $this->db = $database->connect();
    }
}
