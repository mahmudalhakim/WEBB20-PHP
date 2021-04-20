<?php include_once "App.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Users</title>
</head>

<body class="container">
    <h1>Users</h1>

    <?php

        echo "<h2>Från lektion 3</h2>";
        App::main();

        echo "<h2>Arbeta med setters & getters</h2>";
        App::setEndpoint("TEST 1");
        App::setEndpoint("https://jsonplaceholder.typicode.com/users");
        
        echo "<p class='alert alert-success'>The endpoint is: " . App::getEndpoint() . "</p>";

        echo "<h2>Att skicka argument till main-metoden</h2>";
        App::main("TEST 2");
        App::main("https://jsonplaceholder.typicode.com/users");

    ?>

</body>

</html>