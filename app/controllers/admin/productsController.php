<?php
require_once __DIR__ .  '/adminController.php';

require_once '../app/dao/productsDAO.php';
require_once '../app/model/product.php';

class ProductsController extends AdminController
{
    private $productsDAO;

    public function __construct(PDO $db)
    {
        parent::__construct($db); // Chama o banco, inSession() e logout()
        $this->productsDAO = new ProductsDAO($this->db);
    }

    public function products()
    {
        require_once '../app/model/product.php';
        require_once '../app/dao/productsDAO.php';

        $this->productsDAO = new ProductsDAO($this->db);
        $productList = $this->productsDAO->getProducts();

        require_once '../app/views/admin/products.php';
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->productsDAO->delete($id);
        }

        header('Location: ' . base_url('admin/products'));
    }
}
