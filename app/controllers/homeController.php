<?php

class HomeController{
    public function index(){
        $this->home();
    }

    public function home(){
        require_once '../app/views/home.php';
    }
}