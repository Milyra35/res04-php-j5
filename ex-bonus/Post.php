<?php

class Post {
    private int $id;
    private string $title;
    private string $content;
    private int $categoryId;
    
    public function __construct(string $title, string $content, int $categoryId)
    {
        $this->title = $title;
        $this->content = $content;
        $this->categoryId = $categoryId;
        $this->id = -1;
    }
}

?>