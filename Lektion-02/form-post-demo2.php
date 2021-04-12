<?php

echo "<pre>";
// print_r($_SERVER);
echo "</pre>";


if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    echo "<h1>Detta är en $_SERVER[REQUEST_METHOD] request</h1>";
    // http_response_code(400);
    // exit("Bad Request");
    // die("Bad Request"); // enbart vid test
    header("Location: https://google.se");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulär - POST Request</title>
</head>

<body>

    <?php

    // Rensa XXS (t.ex. JavaScript)
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);

    // Remove all illegal characters from email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo ("$email is a valid email address");
    } else {
        echo ("$email is not a valid email address");
        exit();
    }
    
    echo "<h1>Hej $firstname $lastname</h1>";

    ?>

</body>

</html>