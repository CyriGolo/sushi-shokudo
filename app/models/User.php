<?php
namespace App\Models;

class User {

    private $username;
    private $password;
    private $email;
    private $id;

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getId() {
        return $this->id;
    }

    public function setUsername(String $username) {
        $this->username = $username;
    }

    public function setPassword(String $password) {
        $this->password = $password;
    }

    public function setEmail(String $email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId(Int $id) {
        $this->id = $id;
    }
}
