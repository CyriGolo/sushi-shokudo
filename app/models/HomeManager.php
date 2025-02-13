<?php
namespace App\Models;

use App\Models\Menu;

class HomeManager extends Model {

    public function getMenus() {
        $stmt = $this->getDb()->prepare("SELECT * FROM plat");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"App\Models\Menu");
    }

    
}