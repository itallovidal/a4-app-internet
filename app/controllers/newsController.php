<?php

class newsController
{
    public function index()
    {
        $this->news();
    }

    public function news()
    {
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
            )
        ];

        require_once '../app/model/news.php';

        $news = [
            new News(
                1,
                "Sorvete de Chocolate",
                "Delicioso sorvete de chocolate com pedaços de chocolate.",
                base_url('assets/icecreams/ice_cream_01.jpg')
            ),
            new News(
                2,
                "Sorvete de Morango",
                "Refrescante sorvete de morango com pedaços de morango.",
                base_url('assets/icecreams/ice_cream_01.jpg')
            )
        ];

        require_once '../app/views/news.php';
    }
}
