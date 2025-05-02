<?php

class NewsDAO{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getNews($limit = 25){
        try{
            $sql = "SELECT * FROM news ORDER BY id DESC LIMIT $limit";
            $statment = $this->db->query($sql);
            $newsFetched = $statment->fetchAll(PDO::FETCH_ASSOC);
     
            $news = [];
            foreach($newsFetched as $new){
                array_push($news, new News($new['id'], $new['name'], $new['description'], $new['imageSrc']));
            }
            
            return $news;
        } catch (Exception $e){
            throw new Exception("Erro ao buscar os sorvetes: " . $e->getMessage());
        }
    }
}