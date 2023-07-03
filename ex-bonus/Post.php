<?php

class Post {
    private int $id;
    private string $title;
    private string $content;
    private int $categoryId;
    
    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
        $this->categoryId = -1;
        $this->id = -1;
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
    
    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function getCategoryId() : int
    {
        return $this->categoryId;
    }
    public function setCategoryId(int $categoryId) : void
    {
        $this->categoryId = $categoryId;
    }
    
    public function getCatId(PDO $db, string $name)
    {
        $query = $db->prepare("SELECT post_categories.id FROM post_categories WHERE post_categories.name = :name");
        $parameters = [
            'name' => $name 
        ];
        $query->execute($parameters);
        $categoryId = $query->fetch(PDO::FETCH_ASSOC);
        return $categoryId['id'];
    }
    
    public function addPost(PDO $db, Post $post, string $category)
    {
        $query = $db->prepare("INSERT INTO posts (title, content, category_id) 
                               VALUES (?, ?, ?)");
        $query->execute([$post->getTitle(), $post->getContent(), $post->getCatId($db, $category)]);
    }
    
    public function removePost(PDO $db, Post $post)
    {
        $query = $db->prepare("DELETE FROM posts WHERE posts.title = :title;");
        $parameters = [
            'title' => $post->getTitle()
        ];
        $query->execute($parameters);
    }
}

?>