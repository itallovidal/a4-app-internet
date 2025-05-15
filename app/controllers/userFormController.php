<?php
class UserFormController{
    private $db;
    private $usersDAO;

    public function index(){
        $this->userForm();
    }

    public function userForm(){

        require_once '../app/model/database.php';

        require_once '../app/model/users.php';
        require_once '../app/dao/usersDAO.php';

        $database = new MySQLDatabase();
        $this->db = $database->connect();

        $this->usersDAO = new UsersDAO($this->db);

        // Verifica se o formulário foi enviado
        if (!isset($_POST)) {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Valide os dados conforme necessário

            // Cria o usuário usando o DAO
            $userCreate = $this->usersDAO->createUser($name, $email, $password);
            echo $userCreate;
        }
        
        require_once '../app/views/users/form/userForm.php';
    }
}