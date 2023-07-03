<?php

class User {
    private int $id;
    private string $username;
    private string $password;
    private string $email;
    
    public function __construct(string $username, string $password, string $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->id = -1;
    }
    
    public function getUsername() : string
    {
        return $this->username;
    }
    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }
    
    public function getPassword() : string
    {
        return $this->password;
    }
    public function setPassword(string $password) : void
    {
        $this->password = $password;
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
    
    public function addUser(PDO $db, User $user) : void
    {
        $query = $db->prepare("INSERT INTO users (email, username, password) 
                       VALUES (?, ?, ?)");
        $query->execute([$user->getEmail(), $user->getUsername(), $user->getPassword()]);
    }
    
    public function removeUser(PDO $db, User $user) : void
    {
        $query = $db->prepare("DELETE FROM users WHERE users.email = :email");
        $parameters = [
            'email' => $user->getEmail()   
        ];
        $query->execute($parameters);
    }
    
    public function addRole(PDO $db, User $user) : void
    {
        
    }
}

// $marie = new User("Milyra", "bonjour", "marie@gmail.com");
// echo "<pre>";
// print_r($marie);
// echo "<pre>";

?>