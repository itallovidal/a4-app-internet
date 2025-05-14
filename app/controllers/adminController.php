<?php

class AdminController
{
    private $db;
    private $icecreamDAO;
    private $usersDAO;
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

        require_once '../app/model/news.php';
        require_once '../app/dao/newsDAO.php';

        require_once '../app/model/users.php';
        require_once '../app/dao/usersDAO.php';

        $database = new MySQLDatabase();
        $this->db = $database->connect();

        $this->icecreamDAO = new IcecreamDAO($this->db);
        $icecreamList = $this->icecreamDAO->getIcecreams();

        $this->newsDAO = new NewsDAO($this->db);
        $NewsList = $this->newsDAO->getNews();

        $this->usersDAO = new UsersDAO($this->db);
        $userList = $this->usersDAO->getUsers();

        // Verifica se o formulário foi enviado
        // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userForm'])) {
        //     $name = $_POST['name'] ?? '';
        //     $email = $_POST['email'] ?? '';
        //     $password = $_POST['password'] ?? '';

        //     // Valide os dados conforme necessário

        //     // Cria o usuário usando o DAO
        //     $userCreate = $this->usersDAO->createUser($name, $email, $password);
        // }

        require_once '../app/views/admin.php';
    }
}
