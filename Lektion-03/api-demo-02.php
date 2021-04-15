<?php

include_once "functions.php";

function getData($url)
{

    $json =  @file_get_contents($url);
    if (!$json)
        throw new Exception("Could not access $url");

    return json_decode($json, true);
}


function main()
{
    try {

        $array = getData("https://jsonplaceholder.typicode.com/usersXXXXX");
        print_array($array);

    } catch (Exception $error) {
        echo $error->getMessage();
    }
}

main();