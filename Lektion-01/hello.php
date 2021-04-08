<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Example 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body class="container">

    <h1>PHP - Example 1</h1>

    <?php

    // My First PHP Project
    echo "<p class='text-primary'>Hello World</p>";

    // Variables
    $firstName = "maHMUD";
    $lastName = "al Hakim";
    $age = 48;

    echo "<h2>Hello $firstName $lastName!</h2>";

    // Constants
    define("SITE_NAME" , "Nackademin");

    // Strings
    echo "<h2>Strings</h2>";
    echo "$firstName $lastName <br>"; // Mahmud Al Hakim
    // OBS! Enkla citattecken visar inte värdet!
    echo '$firstName $lastName <br>'; // $firstName $lastName

    echo strtoupper($firstName);
    echo "<br>";
    echo strtolower($lastName) . "<br>"; 
    $name = $firstName . " " . $lastName;
    echo ucwords($name) . "<br>";
    echo ucfirst($name) . "<br>";
    echo strlen($name) . "<br>";
    echo ucwords(strtolower($name)) . "<br>";
    echo $name . "<br>"; // OBS! stängar är immutables
    $name = ucwords(strtolower($name));
    echo $name . "<br>";




    ?>


<footer>
    <hr>
    <p class="text-muted">
    <?php echo SITE_NAME ?>
    <br>
    <!-- Shorthand syntax -->
    <?=SITE_NAME?>
    </p>
</footer>
</body>
</html>