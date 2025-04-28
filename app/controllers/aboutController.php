<?php

class AboutController{
    public function index(){
        $this->about();
    }

    public function about(){
        require_once '../app/views/about.php';
    }
}