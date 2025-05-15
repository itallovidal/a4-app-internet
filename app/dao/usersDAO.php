<?php 

class UsersDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUser($email, $password) {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $statment = $this->db->prepare($sql);
            $statment->bindValue(':email', $email);
            $statment->execute();
            $userFetched = $statment->fetch(PDO::FETCH_ASSOC);

            if ($userFetched && $password == $userFetched['password']) {
                return new Users($userFetched['id'], $userFetched['name'], $userFetched['email'], $userFetched['password']);
            } else {
                throw new Exception("Email ou senha inválidos");
            }
        } catch (Exception $e) {
            throw new Exception("Erro ao buscar o usuário: " . $e->getMessage());
        }
    }
    
    public function getUserByid($id) {
        try {
            $sql = "SELECT * FROM users WHERE id = :id";
            $statment = $this->db->prepare($sql);
            $statment->bindValue(':id', $id, PDO::PARAM_INT);
            $statment->execute();
            $user = $statment->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return new Users($user['id'], $user['name'], $user['email'], $user['password']);
            }
            return null;
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
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Email já cadastrado");
        }
        // Insere o novo usuário
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $statment = $this->db->prepare($sql);
        $statment->bindValue(':name', $name);
        $statment->bindValue(':email', $email);
        $statment->bindValue(':password', $password);
        if (!$statment->execute()) {
            $errorInfo = $statment->errorInfo();
            throw new Exception("Erro ao inserir usuário: " . $errorInfo[2]);
        }
    }

    public function deleteUser($id) {
        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $statment = $this->db->prepare($sql);
            $statment->bindValue(':id', $id, PDO::PARAM_INT);
            $statment->execute();
        }
        catch (Exception $e) {
            throw new Exception("Erro ao deletar o usuário: " . $e->getMessage());
        }
    }

    public function updateUser($id, $name, $email, $password) {
        try {
            $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
            $statment = $this->db->prepare($sql);
            $statment->bindValue(':name', $name);
            $statment->bindValue(':email', $email);
            $statment->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
            $statment->bindValue(':id', $id, PDO::PARAM_INT);
            $statment->execute();
        }
        catch (Exception $e) {
            throw new Exception("Erro ao atualizar o usuário: " . $e->getMessage());
        }
    }

}