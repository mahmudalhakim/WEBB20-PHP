<?php include "functions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulär och GET-Request</title>
</head>

<body>

    <h1>Demo 1 - Ladda om sidan</h1>
    <form action="#" method="GET">
        <input type="text" name="firstname">
        <input type="submit" name="submit" value="Sök">
    </form>

    <!-- 
        form-get-demo.php?firstname=Mahmud#
    -->

    <h1>Demo 2 - Gå till en annan sida</h1>
    <form action="form-get-demo2.php" method="GET">
        <input type="text" name="firstname">
        <input type="submit" name="submit" value="Sök">
    </form>


    <?php
    print_array($_GET);
    $firstname = $_GET['firstname'] ?? "Guest";
    echo "<h1>Hello $firstname!</h1>";
    ?>

</body>

</html>