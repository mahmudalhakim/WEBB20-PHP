<?php

include_once "functions.php";

// Arbeta med befintliga APIer

// Steg 1 - Skapa en endpoint
$url = "https://jsonplaceholder.typicode.com/users";

// Steg 2 - Hämta data
$json = file_get_contents($url);

// Test 
// echo $json;

// Steg 3 - Konvertera JSON till en Array
$array = json_decode($json, true);
// Tips! true skapar en associativ array

// Test
// print_array($array);

// Skriv ut alla användare (users)
foreach ($array as $key => $value) {
    // echo $key;
    // echo $value;  // Notice: Array to string conversion
    // print_array($value);
    // echo $value['name'] . "<br>";
    // echo "<h2>$value[name]</h2>";
}

$table = "<table>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>";
foreach ($array as $user) {
    $table .= "<tr>
                 <td> $user[name] </td>
                 <td> $user[email] </td>
               </tr>";
}
$table .= "</table>";
echo $table;