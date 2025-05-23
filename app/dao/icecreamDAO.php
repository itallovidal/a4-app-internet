<?php

class IcecreamDAO
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getIcecreams($limit = 25)
    {
        try {
            $sql = "SELECT * FROM icecream ORDER BY id DESC LIMIT $limit";
            $statment = $this->db->query($sql);
            $icecreamFetched = $statment->fetchAll(PDO::FETCH_ASSOC);

            $icecreams = [];
            foreach ($icecreamFetched as $icecream) {
                array_push($icecreams, new Icecream($icecream['id'], $icecream['name'], $icecream['description'], $icecream['price'], $icecream['imageSrc']));
            }

            return $icecreams;
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
