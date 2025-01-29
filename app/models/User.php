<?php
namespace App\Models;

class User {

    private $username;
    private $password;
    private $email;
    private $id_account;

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getIdAccount() {
        return $this->id_account;
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

    public function setIdAccount(Int $idAccount) {
        $this->id_account = $idAccount;
    }
}
