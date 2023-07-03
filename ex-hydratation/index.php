<?php

$host = "db.3wa.io";
$port = "3306";
$dbname = "marierichir_phpj5";
$connexionString = "mysql:host=$host;port=$port;dbname=$dbname";

$user = "marierichir";
$password = "a616eefc0b8af8e5fb785ae6b42c19f1";

$db = new PDO(
    $connexionString,
    $user,
    $password
);

require 'User.php';

$user = [
    "firstName" => "Clark",
    "lastName" => "Kent",
    "email" => "clark.kent@test.fr"
];

$userOne = new User($user['firstName'], $user['lastName'], $user['email']);
// var_dump($userOne);

// Exercice 2
$query = $db->prepare('SELECT * FROM users WHERE id = 1');
$query->execute();
$test = $query->fetch(PDO::FETCH_ASSOC);
// var_dump($test);

$userTwo = new User($test['first_name'], $test['last_name'], $test['email']);
// var_dump($userTwo);

// Exercice 3
$query = $db->prepare('SELECT * FROM users');
$query->execute();
$exercice3 = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($exercice3);

$table = [];
foreach($exercice3 as $people)
{
    $userThree = new User($people['first_name'], $people['last_name'], $people['email']);
    array_push($table, $userThree);
}
// var_dump($table);

// Exercice 4
$clark = new User("Clark", "Kent", "clark.kent@test.fr");
array_push($table, $clark);
var_dump($clark->getFirstName());
$query = $db->prepare("INSERT INTO users (first_name, last_name, email) 
                       VALUES (?, ?, ?)");
$query->execute([$clark->getFirstName(), $clark->getLastName(), $clark->getEmail()]);

?>