<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

require_once 'Database.php';
require_once 'Name.php';

$db = new Database();

$firstNamesMale = $db->getFirstNamesMale();
$firstNamesFemale = $db->getFirstNamesFemale();
$lastNames = $db->getlastNames();

$limit = isset($_GET['limit']) ? htmlspecialchars($_GET['limit']) : 10;

$names = array();

while (count($names) < $limit) {

    $gender = rand(0, 1);

    $firstname = $gender ? $firstNamesMale[rand(0, count($firstNamesMale) - 1)]
        : $firstNamesFemale[rand(0, count($firstNamesFemale) - 1)];

    $lastname = $lastNames[rand(0, count($lastNames) - 1)];

    $name = new Name($firstname, $lastname, $gender ? "Male" : "Felmale");

    array_push($names, $name->toArray());
}

shuffle($names);

echo json_encode($names, JSON_UNESCAPED_UNICODE);
