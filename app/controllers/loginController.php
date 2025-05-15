<?php

class LoginController
{
    private $db;
    private $usersDAO;

    public function index()
    {
        $this->login();
    }

    public function login()
    {

        require_once '../app/model/database.php';

        require_once '../app/model/users.php';
        require_once '../app/dao/usersDAO.php';

        $database = new MySQLDatabase();
        $this->db = $database->connect();

        $this->usersDAO = new UsersDAO($this->db);

        if (isset($_POST['email']) && isset($_POST['password'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            // Procura o usuário usando o DAO
            $user = $this->usersDAO->getUser($email, $password);

            if (!$user) {

                echo "Email ou senha inválidos";
                return;
            }

            // Inicie a sessão e armazene os dados do usuário
            session_start();
            $_SESSION['user'] = $user;
            header('Location: ' . base_url('admin'));
            exit();
        }

        require_once '../app/views/login.php';
    }
}
