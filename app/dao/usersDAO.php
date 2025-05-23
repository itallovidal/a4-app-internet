<?php
require_once '../app/model/user.php';
class UsersDAO
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getUserById(int $id)
    {
        try {
            $sql = "SELECT * FROM users WHERE id = :id";
            $statment = $this->db->prepare($sql);
            $statment->bindValue(':id', $id, PDO::PARAM_INT);
            $statment->execute();
            $user = $statment->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return new User($user['name'], $user['email'], $user['password'], $user['id']);
            }
            return null;
        } catch (Exception $e) {
            return "Erro ao buscar o usuário: " . $e->getMessage();
        }
    }

    public function getUsers()
    {
        try {
            $sql = "SELECT * FROM users";
            $statment = $this->db->query($sql);
            $usersFetched = $statment->fetchAll(PDO::FETCH_ASSOC);
            $users = [];
            foreach ($usersFetched as $user) {
                $users[] = new User($user['name'], $user['email'], $user['password'], $user['id']);
            }
            return $users;
        } catch (Exception $e) {
            return "Erro ao buscar os usuários: " . $e->getMessage();
        }
    }

    // TODO: Modificar para receber um objeto do tipo User
    public function createUser($name, $email, $password)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Email já cadastrado");
        }
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

    public function deleteUser(int $id)
    {
        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $statment = $this->db->prepare($sql);
            $statment->bindValue(':id', $id, PDO::PARAM_INT);
            $statment->execute();
            if ($statment->rowCount() > 0) {
                return 'Usuário deletado com sucesso.';
            } else {
                return 'Usuário não encontrado.';
            }
        } catch (Exception $e) {
            return "Erro ao deletar o usuário: " . $e->getMessage();
        }
    }

    public function updateUser(int $id, User $user)
    {
        try {
            $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
            $statment = $this->db->prepare($sql);
            $statment->bindValue(':name', $user->getName());
            $statment->bindValue(':email', $user->getEmail());
            $statment->bindValue(':password', $user->getPassword());
            $statment->bindValue(':id', $id, PDO::PARAM_INT);
            $statment->execute();

            if ($statment->rowCount() > 0) {
                return 'Usuário atualizado com sucesso.';
            } else {
                return 'Usuário não encontrado.';
            }
        } catch (Exception $e) {
            return "Erro ao atualizar o usuário: " . $e->getMessage();
        }
    }
    public function login(string $email, string $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $statment = $this->db->prepare($sql);
            $statment->bindValue(':email', $email);
            $statment->execute();
            $userFetched = $statment->fetch(PDO::FETCH_ASSOC);
            if ($userFetched && $password == $userFetched['password']) {
                return new User($userFetched['name'], $userFetched['email'], $userFetched['password'], $userFetched['id']);
            } else {
                return false;
            }
        } catch (Exception $e) {
            return "Erro ao buscar o usuário: " . $e->getMessage();
        }
    }
}
