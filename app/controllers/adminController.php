<?php
require_once '../app/controllers/userController.php';

class AdminController
{
    private $db;
    private $icecreamDAO;
    private $newsDAO;
    private $usersDAO;
    private $userController;

    public function __construct()
    {
        $this->connectDatabase();
        $this->userController = new UserController($this->db);
        $this->logout();

        if ($_GET['url'] != 'admin/login') {
            $this->inSession();
        }
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
        $this->userController->listUsers();
    }

    public function createUser()
    {
        $this->userController->createUser();
    }

    public function editUser($id)
    {
        $this->userController->editUser($id);
    }

    public function deleteUser($id)
    {
        $this->userController->deleteUser($id);
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

        $maxTime = 120;
        if (isset($_SESSION['last_time']) && (time() - $_SESSION['last_time']) > $maxTime) {
            session_unset();
            session_destroy();
            header('Location: ' . base_url('admin/login?expired'));
            exit();
        }

        $_SESSION['last_time'] = time();
    }

    public function login()
    {
        require_once '../app/model/users.php';
        require_once '../app/dao/usersDAO.php';

        $this->usersDAO = new UsersDAO($this->db);

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Procura o usuário usando o DAO
            $user = $this->usersDAO->login($email, $password);

            if (!$user) {
                echo "Email ou senha inválidos";
                return;
            }

            // Inicie a sessão e armazene os dados do usuário
            session_start();
            $_SESSION['user'] = [

                'name' => $user->getName(),
                'email' => $user->getEmail()
            ];
            $_SESSION['last_time'] = time();
            header('Location: ' . base_url('admin'));
            exit();
        }
        require_once '../app/views/login.php';
    }
    
    public function logout()
    {
        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
            header('Location: ' . base_url('admin/login'));
            exit();
        }
    }
}
