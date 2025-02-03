<?php

namespace App\controllers;

use App\models\Travel;
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
        $categories = $this->travelManager->getCategories();
        require VIEWS . 'content/dashboard.php';
    }

    public function deleteTravel($id)
    {
        $this->checkAdmin();
        $travel = $this->travelManager->getTravel($id);
        if ($travel) {
            $imagePath = '../public/img/' . $travel->getImage();
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $this->travelManager->delete($id);
        }
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

    public function addTravel()
    {
        $this->checkAdmin();
        $categories = $this->travelManager->getCategories();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $travel = new Travel();
            $travel->setName($_POST['name']);
            $travel->setDescription($_POST['description']);
            $travel->setPrice($_POST['price']);
            $travel->setIdCategory($_POST['id_category']);

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileName = $_FILES['image']['name'];
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                $newFileName = $travel->getName() . time() . '.' . $fileExtension;
                $uploadFileDir = '../public/img/';
                $dest_path = $uploadFileDir . $newFileName;

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $travel->setImage($newFileName);
                }
            }

            $this->travelManager->add($travel);
            header('Location: /admin');
        }
        require VIEWS . 'content/addTravel.php';
    }

    public function updateTravel($id)
    {
        $this->checkAdmin();
        $travel = $this->travelManager->getTravel($id);
        $categories = $this->travelManager->getCategories();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $travel->setName($_POST['name']);
            $travel->setDescription($_POST['description']);
            $travel->setPrice($_POST['price']);
            $travel->setIdCategory($_POST['id_category']);

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileName = $_FILES['image']['name'];
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                $newFileName = $travel->getName() . $travel->getId() . '.' . $fileExtension;
                $uploadFileDir = '../public/img/';
                $dest_path = $uploadFileDir . $newFileName;

                // Ensure the directory exists
                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0777, true);
                }

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    // Delete old image
                    $oldImagePath = '../public/img/' . $travel->getImage();
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $travel->setImage($newFileName);
                } else {
                    // Handle upload error
                    throw new \Exception('File upload failed: ' . $fileTmpPath . ' to ' . $dest_path);
                }
            }

            $this->travelManager->update($travel);
            header('Location: /admin');
        }
        require VIEWS . 'content/updateTravel.php';
    }

    public function addCategory()
    {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->travelManager->addCategory($_POST['name_category']);
            header('Location: /admin');
        }
        require VIEWS . 'content/addCategory.php';
    }

    public function updateCategory($id)
    {
        $this->checkAdmin();
        $category = $this->travelManager->getCategory($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->travelManager->updateCategory($id, $_POST['name_category']);
            header('Location: /admin');
        }
        require VIEWS . 'content/updateCategory.php';
    }

    public function deleteCategory($id)
    {
        $this->checkAdmin();
        $this->travelManager->deleteCategory($id);
        header('Location: /admin');
    }
}