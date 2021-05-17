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

    public function index()
    {
        $this->view->viewHeader("Välkommen");
        $movies = $this->model->fetchAllMovies();
        $this->view->viewAllMovies($movies);
        $this->view->viewFooter();
    }

    public function about()
    {
        $this->view->viewHeader("Om Oss");
        $this->view->viewAboutPage();
        $this->view->viewFooter();
    }

    public function contact()
    {
        $this->view->viewHeader("Kontakta oss");
        // $this->view->viewAboutPage();
        $this->view->viewFooter();
    }
}
