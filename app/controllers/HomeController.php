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

    public function reservation($id)
    {
        $travels = $this->travelManager->getTravels();
        $travel = $this->travelManager->getTravel($id);
        unset($_SESSION["reservation"]);
        require VIEWS . 'content/reservation.php';
    }

    public function reservationConfirm($id)
    {
        $travels = $this->travelManager->getTravels();
        $travel = $this->travelManager->getTravel($id);
        $_SESSION['reservation'] = $_POST;
        require VIEWS . 'content/reservation.php';
    }
}