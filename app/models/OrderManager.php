<?php
namespace App\Models;

use App\Models\User;
class OrderManager extends Model
{
    public function store($order)
    {
        $stmt = $this->getDb()->prepare("INSERT INTO tp_orders(reference, id_account, id_travel, nb_personne, nb_week, total) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $order->getReference(),
            $order->getIdAccount(),
            $order->getIdTravel(),
            $order->getNbPersonne(),
            $order->getNbWeek(),
            $order->getTotal()
        ]);
    }

    public function getOrder($reference) {
        $stmt = $this->getDb()->prepare("SELECT * FROM tp_orders WHERE reference = ?");
        $stmt->execute([$reference]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Order::class);

        return $stmt->fetch();
    }

    public function getOrdersByUser($userId)
    {
        $stmt = 'SELECT tp_orders.*, tp_travels.name, tp_travels.description, tp_travels.image, tp_travels.price 
                 FROM tp_orders 
                 JOIN tp_travels ON tp_orders.id_travel = tp_travels.id 
                 WHERE tp_orders.id_account = :userId';
        $stmt = $this->getDb()->prepare($stmt);
        $stmt->execute(['userId' => $userId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function getAllOrders() {
        $stmt = $this->getDb()->query('SELECT * FROM tp_orders');
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "App\Models\Order");
    }

    public function getOrderById($id)
    {
        $stmt = $this->getDb()->prepare("SELECT * FROM tp_orders WHERE id_order = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Order::class);

        return $stmt->fetch();
    }

    public function update(Order $order)
    {
        $stmt = $this->getDb()->prepare("UPDATE tp_orders SET reference = ?, id_account = ?, id_travel = ?, nb_personne = ?, nb_week = ?, total = ? WHERE id_order = ?");
        $stmt->execute([
            $order->getReference(),
            $order->getIdAccount(),
            $order->getIdTravel(),
            $order->getNbPersonne(),
            $order->getNbWeek(),
            $order->getTotal(),
            $order->getId()
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->getDb()->prepare("DELETE FROM tp_orders WHERE id_order = ?");
        $stmt->execute([$id]);
    }
}