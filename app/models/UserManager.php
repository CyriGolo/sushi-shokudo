<?php
namespace App\Models;

use App\Models\User;

class UserManager extends Model {

    public function find($identifier) {
        $stmt = $this->getDb()->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$identifier, $identifier]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);

        return $stmt->fetch();
    }

    public function findUser($id) {
        $stmt = $this->getDb()->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);

        $user = $stmt->fetch();
        return $user !== false ? $user : null;
    }
}