<?php 

class UsersDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getUserByid($id) {
        try {
            foreach ($this->getUsers() as $user){
                $sql = "SELECT * FROM users WHERE id = :id";
                $statment = $this->db->prepare($sql);
                $statment->bindValue(':id', $id, PDO::PARAM_INT);
                $statment->execute();
            }
        }
        catch (Exception $e) {
            throw new Exception("Erro ao buscar o usuário: " . $e->getMessage());
        }
    }
    public function getUsers() {
        try {
            $sql = "SELECT * FROM users";
            $statment = $this->db->query($sql);
            $usersFetched = $statment->fetchAll(PDO::FETCH_ASSOC);

            $users = [];
            foreach ($usersFetched as $user) {
                array_push($users, new Users($user['id'], $user['name'], $user['email'], $user['password']));
            }

            return $users;
        } catch (Exception $e) {
            throw new Exception("Erro ao buscar os usuários: " . $e->getMessage());
        }
    }

    public function createUser($name, $email, $password) {
        foreach ($this->getUsers() as $user) {
            if ($email == $user->email) {
                throw new Exception("Email já cadastrado");
            }
            else {
                $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
                $statment = $this->db->prepare($sql);
                $statment->bindValue(':name', $name);
                $statment->bindValue(':email', $email);
                $statment->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
                $statment->execute();
            }
        }
    }
    public function deleteUser($id) {
        try {
            foreach ($this->getUsers() as $user){
                $sql = "DELETE FROM users WHERE id = :id";
                $statment = $this->db->prepare($sql);
                $statment->bindValue(':id', $id, PDO::PARAM_INT);
                $statment->execute();
            }
        }
        catch (Exception $e) {
            throw new Exception("Erro ao buscar o usuário: " . $e->getMessage());
        }
    }
    public function updateUser($id) {
        try {
            foreach ($this->getUsers() as $user){
                $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
                $statment = $this->db->prepare($sql);
                $statment->bindValue(':name', $user->name);
                $statment->bindValue(':email', $user->email);
                $statment->bindValue(':password', password_hash($user->password, PASSWORD_DEFAULT));
                $statment->bindValue(':id', $id, PDO::PARAM_INT);
                $statment->execute();
            }
        }
        catch (Exception $e) {
            throw new Exception("Erro ao buscar o usuário: " . $e->getMessage());
        }
    }

}