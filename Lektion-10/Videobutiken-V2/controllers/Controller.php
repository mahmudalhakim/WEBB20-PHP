<?php

class Controller
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

        switch ($page) {
            case "":
                $this->getAllMovies();
                break;
            case "about":
                $this->about();
                break;
        }
    }

    private function getAllMovies()
    {
        $this->view->viewHeader("Välkommen");
        $movies = $this->model->fetchAllMovies();
        $this->view->viewAllMovies($movies);
        $this->view->viewFooter();
    }

    private function about()
    {
        $this->view->viewHeader("Om Oss");
        $this->view->viewAboutPage();
        $this->view->viewFooter();
    }
}
