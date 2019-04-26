<?php


namespace App\Tests\Util;

use App\Util\Product;
use App\Util\User;
use Exception;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testProductIsValid()
    {
        $userTest = new User();
        $productTest = new Product();

        $date = new \DateTime();
        $user = $userTest->isValid(1, "alexandre", "vagnair", "alexandre.vagnair@hetic.net", $date->setTimestamp(885821386));
        $product = $productTest->isValid(1, "test", $user);
        dump($product);
        $this->assertTrue(true);

    }
}
