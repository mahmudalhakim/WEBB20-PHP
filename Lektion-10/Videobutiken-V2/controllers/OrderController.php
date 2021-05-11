<?php

class OrderController
{

    private $model;
    private $view;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
        $this->router();
    }

    private function router()
    {
        $page = $_GET['page'] ?? "";

        if ($page == "order")
            $this->order();
    }

    private function order()
    {
        $this->view->viewHeader("Beställning");

        $id = $this->sanitize($_GET['id']);
        $movie = $this->model->fetchMovieById($id);

        if ($movie)
            $this->view->viewOrderPage($movie);

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
            $this->processOrderForm();

        $this->view->viewFooter();
    }

    private function processOrderForm()
    {
        $movie_id    = $this->sanitize($_POST['film_id']);
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
    public function sanitize($text)
    {
        $text = trim($text);
        $text = stripslashes($text);
        $text = htmlspecialchars($text);
        return $text;
    }
}
