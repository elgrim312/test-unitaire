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
        $result = $productTest->isValid(1, "ezaezae", $this->mockUser());

        $this->assertTrue($result);

    }

    public function testProductIdNotValid()
    {
        $productTest = new Product();
        $this->expectException(\TypeError::class);
        $result = $productTest->isValid("é", "ezaezae", $this->mockUser());

        $this->assertTrue($result);
    }

    public function testProductTitleNotValid()
    {
        $productTest = new Product();
        $this->expectException(\Exception::class);
        $result = $productTest->isValid(1, "", $this->mockUser());

        $this->assertTrue($result);
    }

    public function testProductUserNotValid()
    {
        $productTest = new Product();
        $this->expectException(\Exception::class);
        $result = $productTest->isValid(1, "", null);

        $this->assertTrue($result);
    }

    public function mockUser()
    {
        $mock = $this->createMock(User::class);

        $mock->method('isValid')->willReturn($mock);

        return $mock;
    }
}
