<?php 
class Users {
    private $id;
    private $name;
    private $email;
    private $password;
    
    public function __construct($id, $nome, $email, $password) {
        $this->id = $id;
        $this->name = $nome;
        $this->email = $email;
        $this->password = $password;
    }
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getEmail() {
        return $this->email;
    }
}
