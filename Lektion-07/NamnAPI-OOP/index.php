<?php

/**
 * NamnAPI OOP
 * 
 * Date: 2021-04-30
 * Copyright: MIT
 * Contact: Mahmud Al Hakim
 * https://github.com/mahmudalhakim/
 */

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

include('Name.php');
include('namesArrays.php');

$limit = isset($_GET["limit"]) ? $_GET["limit"] : 10;

$names = array();

while (count($names) < $limit) {

    $gender = rand(0, 1);

    $firstName = $gender ? $firstNamesFemale[rand(0, count($firstNamesFemale) - 1)]
        : $firstNamesMale[rand(0, count($firstNamesMale) - 1)];

    $lastName = $lastNames[rand(0, count($lastNames) - 1)];

    $name = new Name($firstName,$lastName,$gender ? "female" : "male");

    array_push($names, $name->toArray());
}

shuffle($names);

echo json_encode($names, JSON_UNESCAPED_UNICODE);