<?php
require_once __DIR__ .  '/adminController.php';

class LoginController extends AdminController
{
    private $usersDAO;

    public function __construct(PDO $db)
    {
        parent::__construct($db); // Chama o banco, inSession() e logout()
    }

    public function login()
    {
        require_once '../app/model/user.php';
        require_once '../app/dao/usersDAO.php';

        $this->usersDAO = new UsersDAO($this->db);

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Procura o usuário usando o DAO
            $user = $this->usersDAO->login($email, $password);

            if (!$user) {
                header('Location: ' . base_url('admin/login?incorrect'));
                exit();
            }

            // Inicie a sessão e armazene os dados do usuário
            session_start();
            $_SESSION['user'] = [

                'name' => $user->getName(),
                'email' => $user->getEmail()
            ];
            $_SESSION['last_time'] = time();
            header('Location: ' . base_url('admin/products'));
            exit();
        }
        require_once '../app/views/login.php';
    }
}
