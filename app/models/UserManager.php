<?php
namespace App\Models;

use App\Models\User;
class UserManager extends Model {
    public function find($identifier) {
        $stmt = $this->getDb()->prepare("SELECT * FROM tp_accounts WHERE username = ? OR email = ?");
        $stmt->execute(array(
            $identifier,
            $identifier
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "App\Models\User");

        return $stmt->fetch();
    }

    public function all() {
        $stmt = $this->getDb()->query('SELECT * FROM tp_accounts');

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"App\Models\User");
    }

    public function store($password) {
        $stmt = $this->getDb()->prepare("INSERT INTO tp_accounts(username, password, email) VALUES (?, ?, ?)");
        $stmt->execute(array(
            $_POST["username"],
            $password,
            $_POST["email"]
        ));
    }
}
