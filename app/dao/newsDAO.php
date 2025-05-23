<?php

class NewsDAO
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getNews($limit = 25)
    {
        try {
            $sql = "SELECT * FROM news ORDER BY id DESC LIMIT $limit";
            $statment = $this->db->query($sql);
            $newsFetched = $statment->fetchAll(PDO::FETCH_ASSOC);

            $news = [];
            foreach ($newsFetched as $new) {
                array_push($news, new News($new['id'], $new['name'], $new['description'], $new['imageSrc']));
            }

            return $news;
        } catch (Exception $e) {
            throw new Exception("Erro ao buscar os sorvetes: " . $e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $sql = "DELETE FROM news WHERE id = :id";
            $statment = $this->db->prepare($sql);
            $statment->bindValue(':id', $id, PDO::PARAM_INT);
            $statment->execute();
            if ($statment->rowCount() > 0) {
                return 'Notícia deletado com sucesso.';
            } else {
                return 'Notícia não encontrado.';
            }
        } catch (Exception $e) {
            return "Erro ao deletar Notícia: " . $e->getMessage();
        }
    }
}
