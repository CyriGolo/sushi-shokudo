<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\User;
use App\Models\UserManager;

class UserTest extends TestCase
{
    private User $user;

    /**
     * @before
     */
    public function setUp(): void
    {
        $this->user = new User();
        $this->user->setIdAccount(1);
        $this->user->setUsername('johndoe');
        $this->user->setPassword('password');
        $this->user->setEmail('johndoe@example.com');
        $this->user->setName('John Doe');
        $this->user->setAddress('123 Main St');
        $this->user->setTel('1234567890');
        $this->user->setNumCarte('4111111111111111');
        $this->user->setCrypto('123');
    }

    public function testDatabaseOperations(): void
    {
        $uniqueUsername = 'testuser' . uniqid();
        $this->user->setUsername($uniqueUsername);
        $this->user->setPassword('password');
        $this->user->setEmail($uniqueUsername . '@example.com');

        $manager = new UserManager();

        // Test creating
        $_POST['username'] = $uniqueUsername;
        $_POST['email'] = $uniqueUsername . '@example.com';
        $result = $manager->store($this->user->getPassword());
        $this->assertTrue($result, 'User should be stored successfully');

        // Check if the user was inserted
        $lastId = $manager->getDb()->lastInsertId();
        echo "Last insert ID: " . $lastId . "\n"; // Add this line for debugging
        $this->assertNotEmpty($lastId, 'Last insert ID should not be empty');
        if (empty($lastId)) {
            echo "Insert operation failed. Check the database connection and the SQL query.";
        }

        // Test reading
        $foundUser = $manager->findUser($lastId);
        $this->assertNotNull($foundUser, 'User should be found');
        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertEquals($uniqueUsername, $foundUser->getUsername());
        $this->assertEquals($uniqueUsername . '@example.com', $foundUser->getEmail());

        // Test find by username
        $usernameUser = $manager->find($uniqueUsername);
        $this->assertNotNull($usernameUser, 'User should be found by username');
        $this->assertInstanceOf(User::class, $usernameUser);
        $this->assertEquals($uniqueUsername, $usernameUser->getUsername());

        $manager->getDb()->exec('DELETE FROM tp_accounts WHERE id_account = ' . $lastId);
    }

    public function testGetters(): void
    {
        $this->assertEquals(1, $this->user->getIdAccount());
        $this->assertEquals('johndoe', $this->user->getUsername());
        $this->assertEquals('password', $this->user->getPassword());
        $this->assertEquals('johndoe@example.com', $this->user->getEmail());
        $this->assertEquals('John Doe', $this->user->getName());
        $this->assertEquals('123 Main St', $this->user->getAddress());
        $this->assertEquals('1234567890', $this->user->getTel());
        $this->assertEquals('4111111111111111', $this->user->getNumCarte());
        $this->assertEquals('123', $this->user->getCrypto());
    }

    public function testSetters(): void
    {
        $this->user->setUsername('janedoe');
        $this->assertEquals('janedoe', $this->user->getUsername());

        $this->user->setPassword('newpassword');
        $this->assertEquals('newpassword', $this->user->getPassword());

        $this->user->setEmail('janedoe@example.com');
        $this->assertEquals('janedoe@example.com', $this->user->getEmail());

        $this->user->setName('Jane Doe');
        $this->assertEquals('Jane Doe', $this->user->getName());

        $this->user->setAddress('456 Main St');
        $this->assertEquals('456 Main St', $this->user->getAddress());

        $this->user->setTel('0987654321');
        $this->assertEquals('0987654321', $this->user->getTel());

        $this->user->setNumCarte('4222222222222222');
        $this->assertEquals('4222222222222222', $this->user->getNumCarte());

        $this->user->setCrypto('456');
        $this->assertEquals('456', $this->user->getCrypto());
    }
}