<?php

class IcecreamDAO{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getIcecreams($limit = 25){
        try{
            $sql = "SELECT * FROM icecream ORDER BY id DESC LIMIT $limit";
            $statment = $this->db->query($sql);
            $icecreamFetched = $statment->fetchAll(PDO::FETCH_ASSOC);
     
            $icecreams = [];
            foreach($icecreamFetched as $icecream){
                array_push($icecreams, new Icecream($icecream['id'], $icecream['name'], $icecream['description'], $icecream['price'], $icecream['imageSrc']));
            }
            
            return $icecreams;
        } catch (Exception $e){
            throw new Exception("Erro ao buscar os sorvetes: " . $e->getMessage());
        }
    }
}