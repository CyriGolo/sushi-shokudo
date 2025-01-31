<?php

namespace App\controllers;

use App\models\TravelManager;
use App\models\UserManager;
use App\models\OrderManager;

class AdminController extends BaseController
{
    private $travelManager;
    private $userManager;
    private $orderManager;

    public function __construct()
    {
        $this->travelManager = new TravelManager();
        $this->userManager = new UserManager();
        $this->orderManager = new OrderManager();
    }

    private function checkAdmin()
    {
        if (!isset($_SESSION['user']) || !$_SESSION['user']['role'] === 1) {
            header('Location: /');
            exit();
        }
    }

    public function dashboard()
    {
        $this->checkAdmin();
        $travels = $this->travelManager->getTravels();
        $users = $this->userManager->all();
        $userManager = $this->userManager;
        $orders = $this->orderManager->getAllOrders();
        require VIEWS . 'content/dashboard.php';
    }

    public function updateTravel($id)
    {
        $this->checkAdmin();
        // Logic to update travel
    }

    public function deleteTravel($id)
    {
        $this->checkAdmin();
        // Logic to delete travel
    }

    public function updateUser($id)
    {
        $this->checkAdmin();
        // Logic to update user
    }

    public function deleteUser($id)
    {
        $this->checkAdmin();
        // Logic to delete user
    }

    public function updateOrder($id)
    {
        $this->checkAdmin();
        // Logic to update order
    }

    public function deleteOrder($id)
    {
        $this->checkAdmin();
        // Logic to delete order
    }
}