<?php

/**************************
 * Utskriftsvänlig array
 */
function print_array($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


function getURL($value)
{
    $input = $_GET[$value] ?? false;
    $message = $input ? $input : "Please enter your $value";
    return $message;
}
