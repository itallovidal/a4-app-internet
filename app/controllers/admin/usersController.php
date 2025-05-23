<?php
require_once __DIR__ .  '/adminController.php';

require_once '../app/dao/usersDAO.php';
require_once '../app/model/user.php';

class usersController extends AdminController
{
    private $usersDAO;

    public function __construct(PDO $db)
    {
        parent::__construct($db); // Chama o banco, inSession() e logout()
        $this->usersDAO = new UsersDAO($this->db);
    }

    public function users()
    {
        $usersList = $this->usersDAO->getUsers();
        require_once '../app/views/admin/users.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // TODO: Modificar para criar um objeto User e passar para o DAO
            $this->usersDAO->createUser($name, $email, $password);
            header('Location: ' . base_url('admin/users'));
        }
        require_once '../app/views/forms/users.php';
    }

    public function update($id)
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
            
                $this->usersDAO->updateUser($id, $name, $email, $password);
                header('Location: ' . base_url('admin/users'));
        }
        require_once '../app/views/forms/update.php';
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->usersDAO->deleteUser($id);
        }

        header('Location: ' . base_url('admin/users'));
    }
}
