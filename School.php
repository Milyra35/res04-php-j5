<?php

require 'User.php';

class School {
    private int $id;
    private User $teacher;
    private array $students;
    
    public function __construct(User $teacher)
    {
        $this->teacher = $teacher;
        $this->id = -1;
        $this->students = [];
    }
    
    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function getTeacher()
    {
        return
    }
}

?>