<?php include "functions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET-Request - Demo 1</title>
</head>

<body>

    <?php

    /**************************************************
     * 
     *   Arbeta med GET-Request
     * 
     **************************************************/

    // Superglobal arrays
    // print_array($_SERVER);
    print_array($_GET);

    echo "<hr>";

    // Indexed arrays
    $arrayDemo01 = ["A", "B", "C", "D", "E", "F"];
    $arrayDemo02 = array("A", "B", "C", "D", "E", "F");

    print_array($arrayDemo01);

    // Associative arrays
    $age = array(
        "Peter" => 35,
        "Ben" => 37,
    );
    print_array($age);

    echo "<h1>Ben is " . $age['Ben'] . " years old.</h1>"; // Med konkatenering
    echo "<h1>Ben is $age[Ben] years old.</h1>";           // Utan konkatenering

    if (isset($_GET['name'])) {
        echo "<h1>Hej " . $_GET['name'] . "<h1>";        // Med konkatenering
        echo "<h2Ditt ordernummer är $_GET[order]</h2>"; // Utan konkatenering
    }

    ?>

    <hr>
    <a href="#">Länk till samma sida</a> <br>
    <a href="?name=Mahmud&order=123">Mahmud</a> <br>
    <a href="?name=Jimmy&order=321">Jimmy</a> <br>
    <hr>
    <a href="get-demo2.php">Länk till en annan sida utan en QueryString</a> <br>
    <a href="get-demo2.php?name=Mahmud">Länk till en annan sida med en QueryString</a><br>

</body>

</html>