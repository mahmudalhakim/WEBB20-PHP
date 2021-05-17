<?php

define('URLROOT', 'http://localhost/WEBB20-PHP/Lektion-10/Videobutiken-V3');

// Models
require_once("models/Database.php");
require_once("models/Model.php");
require_once("models/OrderModel.php");

// Views
require_once("views/View.php");
require_once("views/OrderView.php");

// Controllers
require_once("controllers/Controller.php");
require_once("controllers/OrderController.php");

$database   = new Database("moviedb", "root", "root");

$model      = new Model($database);
$view       = new View();
$controller = new Controller($model, $view);

$orderModel = new OrderModel($database);
$orderView  = new OrderView();
$orderController = new OrderController($orderModel, $orderView);


// Simple Router

$url = getUrl();
$page = $url[0] ?? "";
$param = $url[1] ?? "";

switch ($page) {
    case "":
        $controller->index();
        break;
    case "about":
        $controller->about();
        break;
    case "order":
        $orderController->order($param);
        break;
}

function getUrl()
{
    if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        //print_r($url);
        return $url;
    }
}