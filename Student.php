<?php

class Student {
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private $grades;
    
    public function __construct(string $firstName, string $lastName, string $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->id = -1;
        $this->grades = [];
    }
    
    public function getFirstName() : string
    {
        return $this->name;
    }
    public function setFirstName(string $firstName) : void
    {
        $this->firstName = $firstName;
    }
    
    public function getLastName() : string
    {
        return $this->lastName;
    }
    public function setLastName(string $lastName) : void
    {
        $this->lastName = $lastName;
    }
    
    public function getEmail() : string
    {
        return $this->email;
    }
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    
    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function getGrades() : array
    {
        return $this->grades;
    }
    public function setGrades($grades)
    {
        $this->grades = $grades;
    }
    
    public function getFullName() : void
    {
        echo $this->firstName. ' ' .$this->lastName;
    }
    
    public function addGrade(int $nb)
    {
        array_push($this->grades, $nb);
        return $this->grades;
    }
    
    public function removeGrade(int $nb)
    {
        $index = array_search($nb, $this->grades);
        array_splice($this->grades, $index);
        return $this->grades;
    }
    
    public function getAverage() : float
    {
        $sum = 0;
        foreach($this->grades as $grade)
        {
            $sum = $sum + $grade;
        }
        $average = $sum / count($this->grades);
        return $average;
    }
}

$student = new Student("Marie", "Richir", "marie.richir@gmail.com");
$student->addGrade(15);
$student->addGrade(15);

$student->getAverage();
var_dump($student);

?>