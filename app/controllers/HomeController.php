<?php

namespace App\controllers;
use App\models\TravelManager;

class HomeController
{
    public function __construct()
    {
        $this->travelManager = new TravelManager();
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
}