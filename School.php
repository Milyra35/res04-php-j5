<?php

require 'User.php';
require 'Student.php';

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
        return $this->teacher;
    }
    public function setTeacher(User $teacher)
    {
        $this->teacher = $teacher;
    }
    
    public function getStudents()
    {
        return $this->students;
    }
    public function setStudents(Student $students)
    {
        $this->students = $students;
    }
    
    public function addStudent(Student $student)
    {
        array_push($this->students, $student);
        return $this->students;
    }
    
    public function removeStudent(Student $student)
    {
        $index = array_search($student, $index);
        array_splice($this->students, $index);
        return $this->students;
    }
}


$student1 = new Student("Marie", "Richir", "marie.richir@gmail.com");
$student2 = new Student("Laureline", "Aga-Bibrac", "laureline@gmail.com");
$teacher1 = new User("Mari", "Doucet", "mari@gmail.com");

$school = new School($teacher1);
$school->addStudent($student1);
$school->addStudent($student2);
var_dump($school);

?>