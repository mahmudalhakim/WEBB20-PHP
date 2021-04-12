<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulär - GET-Request</title>
</head>
<body>
    
<?php
    include_once "functions.php";
    print_array($_GET);
    $firstname = $_GET['firstname'] ?? "Guest";
    echo "<h1>Hello $firstname!</h1>";
?>
</body>
</html>