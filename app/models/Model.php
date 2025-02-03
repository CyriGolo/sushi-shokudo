<?php

namespace App\models;

class Model
{
    public static function getDb(): \PDO
    {
        require_once __DIR__ . '/../../config/config.php';
        $db = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}