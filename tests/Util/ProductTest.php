<?php


namespace App\Tests\Util;


use App\Util\Product;
use App\Util\User;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function testProductIsValid()
    {
        $productTest = new Product();
        dump($this->mockUser());
        $result = $productTest->isValid(1, "ezaezae", $this->mockUser());

        $this->assertTrue($result);

    }

    public function mockUser()
    {
        $mock = $this->createMock(User::class);

        $mock->method('isValid')->willReturn($mock);

        return $mock;
    }
}
