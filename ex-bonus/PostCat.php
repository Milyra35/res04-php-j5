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
        $query = $db->prepare("INSERT INTO post_categories (name, description) 
                       VALUES (?, ?)");
        $query->execute([$cat->getName(), $cat->getDescription()]);
    }
    
    public function removeCat(PDO $db, PostCat $cat)
    {
        $query = $db->prepare("DELETE FROM post_categories WHERE post_categories.name = :name;");
        $parameters = [
            'name' => $cat->getName()
        ];
        $query->execute($parameters);
    }
    
    public function getCategoryId(PDO $db, string $name)
    {
        $query = $db->prepare("SELECT post_categories.id FROM post_categories WHERE post_categories.name = :name");
        $parameters = [
            'name' => $name 
        ];
        $query->execute($parameters);
        $categoryId = $query->fetch(PDO::FETCH_ASSOC);
        return $categoryId['id'];
    }
}

?>