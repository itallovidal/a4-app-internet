<?php
require_once __DIR__ .  '/adminController.php';

require_once '../app/dao/newsDAO.php';
require_once '../app/model/news.php';

class NewsController extends AdminController
{
    private $newsDAO;

    public function __construct(PDO $db)
    {
        parent::__construct($db); // Chama o banco, inSession() e logout()
        $this->newsDAO = new NewsDAO($this->db);
    }

    public function news()
    {
        require_once '../app/model/news.php';
        require_once '../app/dao/newsDAO.php';

        $this->newsDAO = new NewsDAO($this->db);
        $NewsList = $this->newsDAO->getNews();

        require_once '../app/views/admin/news.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $imageSrc = $_POST['imageSrc'];

            $this->newsDAO->create($name, $description, $imageSrc);
            header('Location: ' . base_url('admin/news'));
        }
        require_once '../app/views/forms/news.php';
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->newsDAO->delete($id);
        }

        header('Location: ' . base_url('admin/news'));
    }
}
