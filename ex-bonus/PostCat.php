<?php

class PostCat {
    private int $id;
    private string $name;
    private string $description;
    
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
        $this->id = -1;
    }
    
    public function getName() : string
    {
        return $this->name;
    }
    public function setName(string $name) : void 
    {
        $this->name = $name;
    }
    
    public function getDescription() : string
    {
        return $this->description;
    }
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
    
    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function addCat(PDO $db, PostCat $cat)
    {
        
    }
    
    public function removeCat(PDO $db, PostCat $cat)
    {
        
    }
}

?>