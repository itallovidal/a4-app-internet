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

    public function createProduct($name, $description, $price, $imageSrc)
    {
        $sql = "SELECT COUNT(*) FROM icecream WHERE name = :name";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Produto já cadastrado");
        }

        $sql = "INSERT INTO icecream (name, description, price, imageSrc) VALUES (:name, :description, :price, :imageSrc)";
        $statment = $this->db->prepare($sql);
        $statment->bindValue(':name', $name);
        $statment->bindValue(':description', $description);
        $statment->bindValue(':price', $price);
        $statment->bindValue(':imageSrc', $imageSrc);

        if (!$statment->execute()) {
            $errorInfo = $statment->errorInfo();
            throw new Exception("Erro ao inserir produto: " . $errorInfo[2]);
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
