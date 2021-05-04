<?php

class Controller
{
    private $model;
    private $view;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function main()
    {
        $this->router();
    }

    // My Simple Router
    private function router()
    {
        $page = $_GET['page'] ?? "";

        switch ($page) {
            case "about":
                $this->about();
                break;
            case "order":
                $this->order();
                break;
            default:
                $this->getAllMovies();
        }
    }

    private function about()
    {
        $this->getHeader("Om Oss");
        $this->view->viewAboutPage();
        $this->getFooter();
    }

    private function getHeader($title)
    {
        $this->view->viewHeader($title);
    }

    private function getFooter()
    {
        $this->view->viewFooter();
    }

    private function getAllMovies()
    {
        $this->getHeader("Välkommen");
        $movies = $this->model->fetchAllMovies();
        $this->view->viewAllMovies($movies);
        $this->getFooter();
    }

    private function order()
    {
        $this->getHeader("Beställningsformulär");
        $id = $this->sanitize($_GET['id']);
        $movie = $this->model->fetchMovieById($id);

        if ($movie) {
            $this->view->viewOneMovie($movie);
            $this->view->viewOrderForm($movie);
        } else {
            header("Location:index.php");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->processOrderForm();
        }
        $this->getFooter();
    }

    private function processOrderForm()
    {
        $movie_id     = $this->sanitize($_POST['film_id']);
        $customer_id = $this->sanitize($_POST['customer_id']);
        $confirm = $this->model->saveOrder($customer_id, $movie_id);

        if ($confirm) {
            $customer = $confirm['customer'];
            $lastInsertId = $confirm['lastInsertId'];
            $this->view->viewConfirmMessage($customer, $lastInsertId);
        } else {
            $this->view->viewErrorMessage($customer_id);
        }
    }

    /**
     * Sanitize Inputs
     * https://www.w3schools.com/php/php_form_validation.asp
     */
    private function sanitize($text)
    {
        $text = trim($text);
        $text = stripslashes($text);
        $text = htmlspecialchars($text);
        return $text;
    }
}
