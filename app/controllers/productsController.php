<?php

class ProductsController{
    public function index(){
        $this->products();
    }

    public function products(){
        require_once '../app/model/icecream.php';

        $products = [
            new Icecream(
            1,
            "Sorvete de Chocolate",
            "Delicioso sorvete de chocolate com pedaços de chocolate belga.",
            19.99,
            base_url('assets/icecreams/ice_cream_01.jpg')
            ),
            new Icecream(
            2,
            "Sorvete de Morango",
            "Refrescante sorvete de morango com calda de frutas vermelhas.",
            18.99,
            base_url('assets/icecreams/ice_cream_01.jpg')
            ),
            new Icecream(
            3,
            "Sorvete de Baunilha",
            "Clássico sorvete de baunilha com toque de fava natural.",
            17.99,
            base_url('assets/icecreams/ice_cream_01.jpg')
            ),
            new Icecream(
            4,
            "Sorvete de Limão",
            "Sorvete cítrico de limão com raspas de casca.",
            16.99,
            base_url('assets/icecreams/ice_cream_01.jpg')
            ),
            new Icecream(
            5,
            "Sorvete de Coco",
            "Sorvete cremoso de coco com pedaços de fruta.",
            18.49,
            base_url('assets/icecreams/ice_cream_01.jpg')
            ),
            new Icecream(
            6,
            "Sorvete de Pistache",
            "Sorvete sofisticado de pistache com crocantes.",
            20.99,
            base_url('assets/icecreams/ice_cream_01.jpg')
            ),
            new Icecream(
            7,
            "Sorvete de Manga",
            "Sorvete tropical de manga com pedaços da fruta.",
            17.49,
            base_url('assets/icecreams/ice_cream_01.jpg')
            ),
            new Icecream(
            8,
            "Sorvete de Café",
            "Sorvete intenso de café com grãos torrados.",
            19.49,
            base_url('assets/icecreams/ice_cream_01.jpg')
            ),
            new Icecream(
            9,
            "Sorvete de Amora",
            "Sorvete de amora com calda artesanal.",
            18.99,
            base_url('assets/icecreams/ice_cream_01.jpg')
            )
        ];

        require_once '../app/views/products.php';
    }
}