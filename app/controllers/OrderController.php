<?php

namespace App\controllers;
use App\models\TravelManager;
use App\Validator;
use App\models\OrderManager;
use App\models\Order;

class OrderController extends BaseController
{
    public function __construct()
    {
        $this->travelManager = new TravelManager();
        $this->validator = new Validator();
        $this->orderManager = new OrderManager();
    }

    public function reservation($id)
    {
        $this->checkAuth();
        $travels = $this->travelManager->getTravels();
        $travel = $this->travelManager->getTravel($id);
        if (!isset($_SESSION['reservation']['error'])) {
            unset($_SESSION["reservation"]);
        }
        require VIEWS . 'content/reservation.php';
    }

    public function reservationConfirm($id)
    {
        $this->checkAuth();
        $travels = $this->travelManager->getTravels();
        $travel = $this->travelManager->getTravel($id);

        $this->validator->validate([
            "email" => ["required", "email"],
            "week" => ["required", "numeric"],
            "count-person" => ["required", "numeric"]
        ]);

        if (!empty($this->validator->errors())) {
            header("Location: /travel/$id");
            exit();
        } else {
            $_SESSION['reservation'] = $_POST;
            require VIEWS . 'content/reservation.php';
        }
    }

    public function confirmation()
    {
        $this->checkAuth();
        unset($_SESSION['reservation']['error']);

        $firstform = $_SESSION['reservation'];
        $secondform = $_POST;

        $this->validator->validate([
            "titulaire" => ["required", "alpha"],
            "card-number" => ["required", "creditCard"],
            "crypto" => ["required", "length:3", "numeric"],
            "facturation" => ["required"],
            "phone" => ["required", "phoneFormat"],
            "condition" => ["required"]
        ]);

        if (!empty($this->validator->errors())) {
            $_SESSION['reservation']['error'] = $this->validator->errors();
            header("Location: /travel/{$firstform['id']}");
            exit();
        } else {
            $travels = $this->travelManager->getTravels();
            $travel = $this->travelManager->getTravel($firstform['id']);

            $total = $travel->getPrice() * $firstform['week'] * $firstform['count-person'];

            $order = new Order();
            $order->setReference(uniqid());
            $order->setIdAccount($_SESSION['user']['id']);
            $order->setIdTravel($firstform['id']);
            $order->setNbPersonne($firstform['count-person']);
            $order->setNbWeek($firstform['week']);
            $order->setTotal($total);

            $this->orderManager->store($order);

            $reference = $order->getReference();

            $reservation = $this->orderManager->getOrder($reference);

            require VIEWS . 'content/confirmation.php';
        }
    }
}