<?php

namespace App\controllers;

class AdminController extends BaseController
{
    
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    private function checkAdmin()
    {
        if (!isset($_SESSION['user']) || !$_SESSION['user']['role'] === 1) {
            header('Location: /');
            exit();
        }
    }
}