<?php

class Page {
    private int $id;
    private string $name;
    private string $title;
    private string $content;
    private string $route;
    
    public function __construct(string $name, string $title, string $content, string $route)
    {
        $this->name = $name;
        $this->title = $title;
        $this->content = $content;
        $this->route = $route;
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
    
    public function getTitle() : string
    {
        return $this->title;
    }
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }
    
    public function getContent() : string
    {
        return $this->content;
    }
    public function setContent(string $content) : void
    {
        $this->content = $content;
    }
    
    public function getRoute() : string
    {
        return $this->route;
    }
    public function setRoute(string $route) : void
    {
        $this->route = $route;
    }
    
    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function addPage(PDO $db, Page $page)
    {
        $query = $db->prepare("INSERT INTO pages (name, content, title, route) 
                       VALUES (?, ?, ?, ?)");
        $query->execute([$page->getName(), $page->getContent(), $page->getTitle(), $page->getRoute()]);
    }
    
    public function removePage(PDO $db, Page $page)
    {
        $query = $db->prepare("DELETE FROM pages
                               WHERE pages.title = :name");
        $parameters = [
            'name' => $page->getName()   
        ];
        $query->execute($parameters);
    }
}

?>