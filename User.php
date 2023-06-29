<?php

class User {
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    
    public function __construct(string $firstName, string $lastName, string $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->id = -1;
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
    
    public function getFullName() : void
    {
        echo $this->firstName. ' ' .$this->lastName;
    }
}

/*$user = new User("Marie", "Richir", "marie.richir@gmail.com");
$user->getFullName();*/

?>

