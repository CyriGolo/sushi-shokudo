<?php

namespace App\controllers;

use App\Models\HomeManager;
use App\Validator;

class HomeController
{
    private $validator;
    private $manager;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->manager = new HomeManager();
    }

    public function index()
    {
        require VIEWS . 'content/homepage.php';
    }

    public function showMenu()
    {
        $menus = $this->manager->getMenus();
        require VIEWS . 'content/menu.php';
    }


}