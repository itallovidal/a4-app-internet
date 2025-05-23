<?php

class ProductsDAO
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getProducts($limit = 25)
    {
        try {
            $sql = "SELECT * FROM icecream ORDER BY id DESC LIMIT $limit";
            $statment = $this->db->query($sql);
            $productsFetched = $statment->fetchAll(PDO::FETCH_ASSOC);

            $productList = [];
            foreach ($productsFetched as $product) {
                array_push($productList, new Product($product['id'], $product['name'], $product['description'], $product['price'], $product['imageSrc']));
            }

            return $productList;
        } catch (Exception $e) {
            throw new Exception("Erro ao buscar os sorvetes: " . $e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $sql = "DELETE FROM icecream WHERE id = :id";
            $statment = $this->db->prepare($sql);
            $statment->bindValue(':id', $id, PDO::PARAM_INT);
            $statment->execute();
            if ($statment->rowCount() > 0) {
                return 'Sorvete deletado com sucesso.';
            } else {
                return 'Sorvete não encontrado.';
            }
        } catch (Exception $e) {
            return "Erro ao deletar sorvete: " . $e->getMessage();
        }
    }
}
