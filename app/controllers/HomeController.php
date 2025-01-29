<?php

namespace App\controllers;
use App\models\TravelManager;

class HomeController extends BaseController
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
        $this->checkAuth();
        $travels = $this->travelManager->getTravels();
        $travel = $this->travelManager->getTravel($id);
        unset($_SESSION["reservation"]);
        require VIEWS . 'content/reservation.php';
    }

    public function reservationConfirm($id)
    {
        $this->checkAuth();
        $travels = $this->travelManager->getTravels();
        $travel = $this->travelManager->getTravel($id);
        $_SESSION['reservation'] = $_POST;
        require VIEWS . 'content/reservation.php';
    }

    public function confirmation() {
        $this->checkAuth();
        $firstform = $_SESSION['reservation'];
        $secondform = $_POST;

        require VIEWS . 'content/confirmation.php';
    }
}