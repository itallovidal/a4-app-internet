<?php

class HomeController{
    private $db;
    private $icecreamDAO;


    public function index(){
        $this->home();
    }

    public function home(){
        require_once '../app/model/icecream.php';
        require_once '../app/dao/icecreamDAO.php';
        require_once '../app/model/database.php';
        $database = new MySQLDatabase();
        $this->db = $database->connect();
        $this->icecreamDAO = new IcecreamDAO($this->db);

        $newerIcecreams = $this->icecreamDAO->getIcecreams(3);

        require_once '../app/views/home.php';
    }
}