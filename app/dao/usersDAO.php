<?php 

class UsersDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
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
    // public function createUser($name, $email, $password) {
    //     foreach ($this->getUsers() as $user) {
    //         if ($email == $user->email) {
    //             throw new Exception("Email já cadastrado");
    //         }
    //         else {
    //             $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    //             $statment = $this->db->prepare($sql);
    //             $statment->bindValue(':name', $name);
    //             $statment->bindValue(':email', $email);
    //             $statment->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
    //             $statment->execute();
    //         }
    //     }
    // }
}