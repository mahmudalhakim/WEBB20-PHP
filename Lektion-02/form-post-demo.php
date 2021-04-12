<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulär - POST Request</title>
</head>

<body>

    <h1>Ladda om sidan</h1>
    <form action="#" method="POST">

        <label for="firstname">First Name</label>
        <input id="firstname" type="text" name="firstname"> <br> <br>

        <label for="lastname">Last Name</label>
        <input id="lastname" type="text" name="lastname"> <br> <br>

        <input type="submit" value="Skicka">
    </form>

    <h1>Skcika data till en annan sida</h1>
    <form action="form-post-demo2.php?test=123456" method="POST">

        <label for="firstname">First Name</label>
        <input id="firstname" type="text" name="firstname" required> <br> <br>

        <label for="lastname">Last Name</label>
        <input id="lastname" type="text" name="lastname"> <br> <br>

        <label for="email">Email</label>
        <input id="email" type="email" name="email" required> <br> <br>

        <input type="hidden" name="id" value="12345">

        <input type="submit" value="Skicka">
    </form>

    <?php
    require_once "functions.php";
    print_array($_POST);
    ?>

</body>

</html>