<?php
require_once __DIR__ .  '/adminController.php';

class NewsController extends AdminController {

    public function __construct(PDO $db)
    {
        parent::__construct($db); // Chama o banco, inSession() e logout()
    }

    public function news()
    {
        require_once '../app/model/news.php';
        require_once '../app/dao/newsDAO.php';

        $this->newsDAO = new NewsDAO($this->db);
        $NewsList = $this->newsDAO->getNews();

        require_once '../app/views/admin/news.php';
    }
}