<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Travel;
use App\Models\TravelManager;

class TravelTest extends TestCase
{
    private Travel $travel;

    /**
     * @before
     */
    public function setUp(): void
    {
        $this->travel = new Travel();
        $this->travel->setId(1);
        $this->travel->setName('Paris');
        $this->travel->setDescription('A trip to Paris');
        $this->travel->setImage('paris.jpg');
        $this->travel->setPrice(500.00);
        $this->travel->setIdCategory(1);
    }

    public function testGetters(): void
    {
        $this->assertEquals(1, $this->travel->getId());
        $this->assertEquals('Paris', $this->travel->getName());
        $this->assertEquals('A trip to Paris', $this->travel->getDescription());
        $this->assertEquals('paris.jpg', $this->travel->getImage());
        $this->assertEquals(500.00, $this->travel->getPrice());
        $this->assertEquals(1, $this->travel->getIdCategory());
    }

    public function testSetters(): void
    {
        $this->travel->setName('London');
        $this->assertEquals('London', $this->travel->getName());

        $this->travel->setDescription('A trip to London');
        $this->assertEquals('A trip to London', $this->travel->getDescription());

        $this->travel->setImage('london.jpg');
        $this->assertEquals('london.jpg', $this->travel->getImage());

        $this->travel->setPrice(600.00);
        $this->assertEquals(600.00, $this->travel->getPrice());

        $this->travel->setIdCategory(2);
        $this->assertEquals(2, $this->travel->getIdCategory());
    }

    public function testDatabaseOperations(): void
    {
        $manager = new TravelManager();

        // Test creating
        $result = $manager->add($this->travel);
        $this->assertTrue($result);

        // Test reading
        $lastId = $manager->getDb()->lastInsertId();
        $foundTravel = $manager->getTravel($lastId);
        $this->assertInstanceOf(Travel::class, $foundTravel);
        $this->assertEquals('Paris', $foundTravel->getName());
        $this->assertEquals(500.00, $foundTravel->getPrice());

        // Test find by category
        $categoryTravels = $manager->getTravelsByCategory(1);
        $this->assertIsArray($categoryTravels);
        $this->assertGreaterThan(0, count($categoryTravels));

        $manager->getDb()->exec('DELETE FROM tp_travels WHERE id = ' . $lastId);
    }
}