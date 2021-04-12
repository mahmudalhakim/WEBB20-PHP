<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET-Request - Demo 2</title>
</head>

<body>

    <h1>Produkter</h1>
    <p>
        <a href="?id=1&name=Penna&price=15">Visa info om produkt 1</a> <br>
        <a href="?id=2&name=Sudgummi&price=10">Visa info om produkt 2</a> <br>
        <a href="?id=3&name=Block&price=19">Visa info om produkt 3</a> <br>
    </p>

    <?php

    if (isset($_GET['name']))
        echo "<h1>$_GET[name]</h1>";
    else
        echo "<h1>Hello World</h1>";


    // Ternary oparator
    $price = isset($_GET['price']) ? $_GET['price'] : 'XX';

    echo "<h2>Pris: $price kr</h2>"; 
    



    print_array($_GET);


    function print_array($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    ?>


</body>

</html>