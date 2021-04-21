<?php

// Steg 1 - Ange lämpliga HTTP headers
// Läs mer här: https://stackoverflow.com/questions/10636611/how-does-access-control-allow-origin-header-work
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

// Steg 2 - Skapa arrayer
$firstNames = ["Åsa", "Mahmud", "Björn", "Jimmy", "F5", "F6", "F7", "F8", "F9", "F10"];
$lastNames = ["Öberg", "Al Hakim", "L3", "L4", "L5", "L6", "L7", "L8", "L9", "L10"];

// Steg 3 - Skapa 10 namn och spara dessa i en ny array
$names = array();

for ($i = 0; $i < 10; $i++) {
    $name = array(
        "firstname" => $firstNames[rand(0, 9)],
        "lastname" => $lastNames[rand(0, 9)]
    );
    array_push($names, $name);
}

// print_r($names); die();

// Steg 4 – Konvertera PHP-arrayen ($names) till JSON
$json = json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

// json_encode — Returns the JSON representation of a value // http://php.net/manual/en/function.json-encode.php

// Steg 5 – Skicka JSON till klienten
echo $json;

// OBS Viktigt!
// Ingen extra data får skickas till klienten,
// t.ex. HTML-kod