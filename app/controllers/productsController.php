<?php

class ProductsController{
    public function index(){
        $this->products();
    }

    public function products(){
        require_once '../app/views/products.php';
    }
}