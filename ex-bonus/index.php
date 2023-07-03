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

require 'User.php';
require 'Page.php';
require 'PostCat.php';
require 'Role.php';

$marie = new User("Milyra", "bonjour", "marie@gmail.com");
// $marie->addUser($db, $marie);
$marie->removeUser($db, $marie);

$newCategory = new PostCat("PC", "blabla");
$newCategory->addCat($db, $newCategory);
$newCategory->removeCat($db, $newCategory);

print_r($newCategory->getCategoryId($db, "Gaming"));


?>