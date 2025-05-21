<?php
require_once '../app/model/users.php';
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

    public function createUser(User $user): bool
    {
        try {
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':name', $user->getName());
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':password', $user->getPassword());
            return $stmt->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao inserir usuário: " . $e->getMessage());
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
                return 'Email ou senha inválidos';
            }
        } catch (Exception $e) {
            return "Erro ao buscar o usuário: " . $e->getMessage();
        }
    }
}
