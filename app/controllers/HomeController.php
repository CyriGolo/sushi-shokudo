<?php

namespace App\controllers;
use App\models\TravelManager;
use App\models\OrderManager;
use App\Validator;

class HomeController
{
    private $travelManager;
    private $validator;

    public function __construct()
    {
        $this->travelManager = new TravelManager();
        $this->orderManager = new OrderManager();
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

    public function voyages()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        $userId = $_SESSION['user']['id'];
        $orders = $this->orderManager->getOrdersByUser($userId);
        require VIEWS . 'content/voyages.php';
    }
}