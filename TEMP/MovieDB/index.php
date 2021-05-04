<?php

/**********************************************
 *       
 *                PHP MVC
 *       
 **********************************************/

require_once("models/Database.php");
require_once("models/Model.php");
require_once("views/View.php");
require_once("controllers/Controller.php");

$database   = new Database("moviedb");
$model      = new Model($database);          // Dependency Injection
$view       = new View();
$controller = new Controller($model, $view); // Dependency Injection

$controller->main();

// Tips
// Bra att läsa om "Dependency Injection"
// https://codeinphp.github.io/post/dependency-injection-in-php/