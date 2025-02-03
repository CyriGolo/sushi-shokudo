<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Order;
use App\Models\OrderManager;
use App\Models\User;
use App\Models\UserManager;

class OrderTest extends TestCase
{
    private Order $order;

    /**
     * @before
     */
    public function setUp(): void
    {
        $this->order = new Order();
        $this->order->setReference('REF123');
        $this->order->setIdTravel(1);
        $this->order->setNbPersonne(2);
        $this->order->setNbWeek(1);
        $this->order->setTotal(1000.00);
    }

    public function testDatabaseOperations(): void
    {
        $userManager = new UserManager();
        $user = new User();
        $uniqueUsername = 'testuser' . uniqid();
        $user->setUsername($uniqueUsername);
        $user->setPassword('password');
        $user->setEmail($uniqueUsername . '@example.com');
        $_POST['username'] = $uniqueUsername;
        $_POST['email'] = $uniqueUsername . '@example.com';
        $userManager->store($user->getPassword());

        $lastUserId = $userManager->getDb()->lastInsertId();
        $this->order->setIdAccount($lastUserId);

        $manager = new OrderManager();

        // Test creating
        $result = $manager->store($this->order);
        $this->assertTrue($result);

        // Test reading
        $lastId = $manager->getDb()->lastInsertId();
        $foundOrder = $manager->getOrderById($lastId);
        $this->assertInstanceOf(Order::class, $foundOrder);
        $this->assertEquals('REF123', $foundOrder->getReference());
        $this->assertEquals(1000.00, $foundOrder->getTotal());

        // Test find by user
        $userOrders = $manager->getOrdersByUser($lastUserId);
        $this->assertIsArray($userOrders);
        $this->assertGreaterThan(0, count($userOrders));

        $manager->getDb()->exec('DELETE FROM tp_orders WHERE id_order = ' . $lastId);
        $userManager->getDb()->exec('DELETE FROM tp_accounts WHERE id_account = ' . $lastUserId);
    }

    public function testGetters(): void
    {
        $this->assertEquals(1, $this->order->getId());
        $this->assertEquals('REF123', $this->order->getReference());
        $this->assertEquals(1, $this->order->getIdAccount());
        $this->assertEquals(1, $this->order->getIdTravel());
        $this->assertEquals(2, $this->order->getNbPersonne());
        $this->assertEquals(1, $this->order->getNbWeek());
        $this->assertEquals(1000.00, $this->order->getTotal());
    }

    public function testSetters(): void
    {
        $this->order->setReference('REF456');
        $this->assertEquals('REF456', $this->order->getReference());

        $this->order->setIdAccount(2);
        $this->assertEquals(2, $this->order->getIdAccount());

        $this->order->setIdTravel(2);
        $this->assertEquals(2, $this->order->getIdTravel());

        $this->order->setNbPersonne(3);
        $this->assertEquals(3, $this->order->getNbPersonne());

        $this->order->setNbWeek(2);
        $this->assertEquals(2, $this->order->getNbWeek());

        $this->order->setTotal(2000.00);
        $this->assertEquals(2000.00, $this->order->getTotal());
    }
}