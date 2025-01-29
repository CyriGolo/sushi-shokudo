<?php

namespace App\Controllers;

class BaseController
{
    protected function checkAuth()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }
    }
}