<?php

$host = "db.3wa.io";
$port = "3306";
$dbname = "marierichir_modelisation";
$connexionString = "mysql:host=$host;port=$port;dbname=$dbname";

$user = "marierichir";
$password = "a616eefc0b8af8e5fb785ae6b42c19f1";

$db = new PDO(
    $connexionString,
    $user,
    $password
);


function getUserId(PDO $db, User $user)
{
    $query = $db->prepare("SELECT users.id FROM users WHERE users.username = :name");
    $parameters = [
        'name' => $user->getUsername()    
    ];
    $query->execute($parameters);
    $userId = $query->fetch(PDO::FETCH_ASSOC);
    return $userId['id'];
};

function getRoleId(PDO $db, string $role)
{
    $query = $db->prepare("SELECT roles.id FROM roles WHERE roles.name = :name");
    $parameters = ['name' => $role];
    $query->execute($parameters);
    $roleId = $query->fetch(PDO::FETCH_ASSOC);
    return $roleId['id'];
};

require 'User.php';
require 'Page.php';
require 'PostCat.php';
require 'Role.php';
require 'Post.php';

// $marie = new User("Milyra", "bonjour", "marie@gmail.com");
// $marie->removeUser($db, $marie);
// echo "<pre>";
// print_r($marie = getUserId($db, $marie));
// echo "<pre>";
// print_r(getRoleId($db, "Admin"));
// $marie->removeUser($db, $marie);

// $newCategory = new PostCat("PC", "blabla");
// $newCategory->addCat($db, $newCategory);
// $newCategory->removeCat($db, $newCategory);

// $newCat = new Post("PC", "blabla");
// $newCat->addPost($db, $newCat, "Gaming");
// print_r($newCat->getCatId($db, "Gaming"));
// $newCat->removePost($db, $newCat);


?>