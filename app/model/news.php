<?php 

class News {
    private $id;
    private $name;
    private $description;
    private $imageUrl;

    public function __construct($id, $name, $description, $imageUrl) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
    }

    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getDescription() {
        return $this->description;
    }
    public function imageSrc() {
        return $this->imageUrl;
    }
}