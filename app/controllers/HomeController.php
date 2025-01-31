<?php

namespace App\controllers;
use App\models\TravelManager;
use App\Validator;

class HomeController
{
    private $travelManager;
    private $validator;

    public function __construct()
    {
        $this->travelManager = new TravelManager();
        $this->validator = new Validator();
    }

    public function index()
    {
        require VIEWS . 'content/homepage.php';
    }

    public  function travel()
    {
        $travels = $this->travelManager->getTravels();
        require VIEWS . 'content/travel.php';
    }

    public function filtredTravel($id_category)
    {
        $travels = $this->travelManager->getTravelsByCategory($id_category);
        require VIEWS . 'content/travel.php';
    }

}