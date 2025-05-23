<?php 

class News {
    private $id;
    private $name;
    private $description;
    private $imageSrc;

    public function __construct($id, $name, $description, $imageSrc) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->imageSrc = $imageSrc;
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
        return $this->imageSrc;
    }
}