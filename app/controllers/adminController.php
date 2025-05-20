<?php

class AdminController
{
    private $db;
    private $icecreamDAO;
    private $usersDAO;
    private $newsDAO;

    public function __construct()
    {
        $this->inSession();
        $this->connectDatabase();
        $this->logout();
    }

    public function index()
    {
        header('Location: ' . base_url('admin/products'));
    }

    public function products()
    {
        require_once '../app/model/icecream.php';
        require_once '../app/dao/icecreamDAO.php';

        $this->icecreamDAO = new IcecreamDAO($this->db);
        $icecreamList = $this->icecreamDAO->getIcecreams();

        require_once '../app/views/admin/products.php';
    }

    public function news()
    {
        require_once '../app/model/news.php';
        require_once '../app/dao/newsDAO.php';

        $this->newsDAO = new NewsDAO($this->db);
        $NewsList = $this->newsDAO->getNews();

        require_once '../app/views/admin/news.php';
    }

    public function users()
    {
        require_once '../app/model/users.php';
        require_once '../app/dao/usersDAO.php';

        $this->usersDAO = new UsersDAO($this->db);
        $usersList = $this->usersDAO->getUsers();

        require_once '../app/views/admin/users.php';
    }

    private function connectDatabase()
    {
        require_once '../app/model/database.php';

        $database = new MySQLDatabase();
        $this->db = $database->connect();
    }

    private function inSession()
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: ' . base_url('login?expired'));
            exit();
        }

        $maxTime = 120;
        if (isset($_SESSION['last_time']) && (time() - $_SESSION['last_time']) > $maxTime) {
            session_unset();
            session_destroy();
            header('Location: ' . base_url('login?expired'));
            exit();
        }

        $_SESSION['last_time'] = time();
    }

    private function logout() {

        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
            header('Location: ' . base_url('login'));
            exit();
        }
        
    }
}
