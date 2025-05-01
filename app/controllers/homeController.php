<?php

class HomeController{
    public function index(){
        $this->home();
    }

    public function home(){
        require_once '../app/model/icecream.php';

        $products = [
            new Icecream(
                1,
                "Sorvete de Chocolate",
                "Delicioso sorvete de chocolate com pedaços de chocolate.",
                19.99,
                base_url('assets/icecreams/ice_cream_01.jpg')
            ),
            new Icecream(
                2,
                "Sorvete de Morango",
                "Refrescante sorvete de morango com pedaços de morango.",
                18.99,
                base_url('assets/icecreams/ice_cream_01.jpg')
            ),
            new Icecream(
                3,
                "Sorvete de Baunilha",
                "Clássico sorvete de baunilha cremoso.",
                17.99,
                base_url('assets/icecreams/ice_cream_01.jpg')
            )
        ];

        require_once '../app/views/home.php';
    }
}