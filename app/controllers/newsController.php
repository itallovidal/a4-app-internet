<?php 

    class newsController {
        public function index() {
            $this->news();
        }

        public function news() {
            require_once '../app/views/news.php';
        }
    }

?>