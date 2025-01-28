<?php

namespace App\models;

class TravelManager extends Model
{
    public function getTravels()
    {
        $stmt = 'SELECT * FROM tp_travels JOIN tp_category ON tp_travels.id_category = tp_category.id_category';
        $stmt = $this->getDb()->prepare($stmt);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Travel::class);

        return $stmt->fetchAll();
    }

    public function getTravel($id)
    {
        $stmt = 'SELECT * FROM tp_travels JOIN tp_category ON tp_travels.id_category = tp_category.id_category WHERE id = :id';
        $stmt = $this->getDb()->prepare($stmt);
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Travel::class);

        return $stmt->fetch();
    }

    public function getTravelsByCategory($id_category)
    {
        $stmt = 'SELECT * FROM tp_travels WHERE id_category = :id_category';
        $stmt = $this->getDb()->prepare($stmt);
        $stmt->execute(['id_category' => $id_category]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Travel::class);

        return $stmt->fetchAll();
    }
}