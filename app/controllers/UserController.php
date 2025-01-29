<?php

namespace App\Controllers;

use App\Models\UserManager;
use App\Validator;

class UserController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new UserManager();
        $this->validator = new Validator();
    }

    public function showLogin() {
        require VIEWS . 'Auth/login.php';
    }

    public function showRegister() {
        require VIEWS . 'Auth/register.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login/');
    }

    public function register() {
    $this->validator->validate([
        "username" => ["required", "min:3", "alphaNum"],
        "email" => ["required", "email"],
        "password" => ["required", "min:6", "alphaNum"],
        "passwordConfirm" => ["required", "min:6", "alphaNum"]
    ]);
    $_SESSION['old'] = $_POST;

    if ($_POST['password'] !== $_POST['passwordConfirm']) {
        $_SESSION["error"]['passwordConfirm'] = "Les mots de passe ne correspondent pas !";
        header("Location: /register");
        exit();
    }

    if (!$this->validator->errors()) {
        $resUsername = $this->manager->find($_POST["username"]);
        $resEmail = $this->manager->find($_POST["email"]);

        if (empty($resUsername) && empty($resEmail)) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->manager->store($password);

            $_SESSION["user"] = [
                "id" => $this->manager->getDb()->lastInsertId(),
                "username" => $_POST["username"],
                "email" => $_POST["email"]
            ];
            header("Location: /");
        } else {
            if (!empty($resUsername)) {
                $_SESSION["error"]['username'] = "Le username choisi est déjà utilisé !";
            }
            if (!empty($resEmail)) {
                $_SESSION["error"]['email'] = "L'email choisi est déjà utilisé !";
            }
            header("Location: /register");
        }
    } else {
        header("Location: /register");
    }
}

    public function login() {
        $this->validator->validate([
            "identifier" => ["required", "min:3"],
            "password" => ["required", "min:6", "alphaNum"]
        ]);

        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["identifier"]);

            if ($res && password_verify($_POST['password'], $res->getPassword())) {
                $_SESSION["user"] = [
                    "id" => $res->getId(),
                    "username" => $res->getUsername(),
                    "email" => $res->getEmail()
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['message'] = "Une erreur sur les identifiants";
                header("Location: /login");
            }
        } else {
            header("Location: /login");
        }
    }
}