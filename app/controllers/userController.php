<?php

require_once '../app/dao/usersDAO.php';
require_once '../app/model/users.php';

class UserController
{
    private $db;
    private $usersDAO;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->usersDAO = new UsersDAO($this->db);
    }

    public function listUsers()
    {
        $usersList = $this->usersDAO->getUsers();
        require_once '../app/views/admin/users.php';
    }

    public function createUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // TODO: Modificar para criar um objeto User e passar para o DAO
            $this->usersDAO->createUser($name, $email, $password);
            header('Location: ' . base_url('admin/users'));
        }
        require_once '../app/views/users/form/createForm.php';
    }

    public function editUser($id)
    {
        $userResult = $this->usersDAO->getUserById($id);
        if ($userResult['status'] == 200) {
            $user = $userResult['user'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $updatedUser = new User($name, $email, $password);
                $this->usersDAO->updateUser($id, $updatedUser);
                header('Location: ' . base_url('admin/users'));
            }

            require_once '../app/views/admin/edit_user.php';
        } else {
            header('Location: ' . base_url('admin/users'));
        }
    }

    public function deleteUser($id)
    {
        $this->usersDAO->deleteUser($id);
        header('Location: ' . base_url('admin/users'));
    }

}
