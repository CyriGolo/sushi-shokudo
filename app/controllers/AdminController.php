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
        $travel = $this->travelManager->getTravel($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $travel->setName($_POST['name']);
            $travel->setDescription($_POST['description']);
            $travel->setImage($_POST['image']);
            $travel->setPrice($_POST['price']);
            $travel->setIdCategory($_POST['id_category']);
            $this->travelManager->update($travel);
            header('Location: /admin');
        }
        require VIEWS . 'content/updateTravel.php';
    }

    public function deleteTravel($id)
    {
        $this->checkAdmin();
        $this->travelManager->delete($id);
        header('Location: /admin');
    }

    public function updateUser($id)
    {
        $this->checkAdmin();
        $user = $this->userManager->findUser($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->setUsername($_POST['username']);
            $user->setEmail($_POST['email']);
            $user->setName($_POST['name']);
            $user->setAddress($_POST['address']);
            $user->setTel($_POST['tel']);
            $user->setIdRole($_POST['id_role']);
            $this->userManager->update($user);
            header('Location: /admin');
        }
        require VIEWS . 'content/updateUser.php';
    }

    public function deleteUser($id)
    {
        $this->checkAdmin();
        $this->userManager->delete($id);
        header('Location: /admin');
    }

    public function updateOrder($id)
    {
        $this->checkAdmin();
        $order = $this->orderManager->getOrderById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $order->setReference($_POST['reference']);
            $order->setIdAccount($_POST['id_account']);
            $order->setIdTravel($_POST['id_travel']);
            $order->setNbPersonne($_POST['nb_personne']);
            $order->setNbWeek($_POST['nb_week']);
            $order->setTotal($_POST['total']);
            $this->orderManager->update($order);
            header('Location: /admin');
        }
        require VIEWS . 'content/updateOrder.php';
    }

    public function deleteOrder($id)
    {
        $this->checkAdmin();
        $this->orderManager->delete($id);
        header('Location: /admin');
    }
}