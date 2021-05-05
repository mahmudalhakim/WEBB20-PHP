<?php

require_once 'Database.php';

$db = new Database();

$firstNamesMale = $db->getFirstNamesMale();
$firstNamesFemale = $db->getFirstNamesFemale();
$lastNames = $db->getlastNames();



print_r($lastNames);