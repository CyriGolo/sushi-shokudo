<?php
namespace App\Models;

use App\Models\User;

class UserManager extends Model {

    public function find($identifier) {
        $stmt = $this->getDb()->prepare("SELECT * FROM tp_accounts WHERE username = ? OR email = ?");
        $stmt->execute([$identifier, $identifier]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);

        return $stmt->fetch();
    }

    public function findUser($id) {
        $stmt = $this->getDb()->prepare("SELECT * FROM tp_accounts WHERE id_account = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);

        $user = $stmt->fetch();
        return $user !== false ? $user : null;
    }

    public function all() {
        $stmt = $this->getDb()->query('SELECT * FROM tp_accounts');

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "App\Models\User");
    }

    public function store($password)
    {
        try {
            $stmt = $this->getDb()->prepare("INSERT INTO tp_accounts(username, password, email, id_role) VALUES (?, ?, ?, ?)");
            $result = $stmt->execute([$_POST["username"], $password, $_POST["email"], 1]);
            if ($result) {
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "Insert operation failed: " . $errorInfo[2];
                return false;
            }
        } catch (\PDOException $e) {
            echo "PDOException: " . $e->getMessage();
            return false;
        }
    }

    public function updatePayement($user) {
        $stmt = $this->getDb()->prepare("UPDATE tp_accounts SET name = ?, address = ?, tel = ?, num_carte = ?, crypto = ? WHERE id_account = ?");
        $stmt->execute([
            $user->getName(),
            $user->getAddress(),
            $user->getTel(),
            $user->getNumCarte(),
            $user->getCrypto(),
            $user->getIdAccount()
        ]);
    }

    public function getRoleName($id_role) {
        $stmt = $this->getDb()->prepare("SELECT name_role FROM tp_roles WHERE id_role = ?");
        $stmt->execute([$id_role]);
        return $stmt->fetchColumn();
    }

    public function update(User $user)
    {
        $stmt = $this->getDb()->prepare("UPDATE tp_accounts SET username = ?, email = ?, name = ?, address = ?, tel = ?, id_role = ? WHERE id_account = ?");
        $stmt->execute([
            $user->getUsername(),
            $user->getEmail(),
            $user->getName(),
            $user->getAddress(),
            $user->getTel(),
            $user->getIdRole(),
            $user->getIdAccount()
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->getDb()->prepare("DELETE FROM tp_accounts WHERE id_account = ?");
        $stmt->execute([$id]);
    }
}