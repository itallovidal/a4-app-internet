<?php
require_once __DIR__ .  '/adminController.php';

require_once '../app/dao/icecreamDAO.php';
require_once '../app/model/icecream.php';

class ProductsController extends AdminController
{
    private $icecreamDAO;

    public function __construct(PDO $db)
    {
        parent::__construct($db); // Chama o banco, inSession() e logout()
        $this->icecreamDAO = new IcecreamDAO($this->db);
    }

    public function products()
    {
        require_once '../app/model/icecream.php';
        require_once '../app/dao/icecreamDAO.php';

        $this->icecreamDAO = new IcecreamDAO($this->db);
        $icecreamList = $this->icecreamDAO->getIcecreams();

        require_once '../app/views/admin/products.php';
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->icecreamDAO->delete($id);
        }

        header('Location: ' . base_url('admin/products'));
    }
}
