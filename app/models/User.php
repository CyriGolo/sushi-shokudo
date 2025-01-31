<?php
namespace App\Models;

class User {

    private $username;
    private $password;
    private $email;
    private $id_account;
    private $name;
    private $address;
    private $tel;
    private $num_carte;
    private $crypto;

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getIdAccount() {
        return $this->id_account;
    }

    public function getName() {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getNumCarte() {
        return $this->num_carte;
    }

    public function getCrypto() {
        return $this->crypto;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIdRole() {
        return $this->id_role;
    }

    public function getFormattedNumCarte() {
        return '**** **** **** ' . substr($this->num_carte, -4);
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

    public function setIdAccount(Int $idAccount) {
        $this->id_account = $idAccount;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setNumCarte($num_carte) {
        $this->num_carte = $num_carte;
    }

    public function setCrypto($crypto) {
        $this->crypto = $crypto;
    }

    public function setIdRole($id_role) {
        $this->id_role = $id_role;
    }
}