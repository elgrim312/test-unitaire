<?php


namespace App\Tests\Util;

use App\Util\Product;
use App\Util\User;
use Exception;
use PHPUnit\Framework\TestCase;
use TypeError;

class UserTest extends TestCase
{

    /**
     * @var \DateTime
     */
    private $currentDate;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->currentDate = new \DateTime();
        parent::__construct($name, $data, $dataName);
    }

    // good value
    public function testUserIsValid()
    {
        $userTest = new User();
        $valid = $userTest->isValid(1, "alexandre", "vagnair", "alexandrevagnaie1@gmail.com",$this->currentDate->setTimestamp(885821386));

        $this->assertTrue($valid);
    }

    // bad id
    public function testUserIdNotValid()
    {
        $userTest = new User();
        $this->expectException(\TypeError::class);
        $valid = $userTest->isValid("e", "alexandre", "vagnair", "alexandrevagnaie1@gmail.com",$this->currentDate->setTimestamp(885821386));

        $this->assertTrue($valid);
    }

    // bad firstname
    public function testUserFirstnameNotValid()
    {
        $userTest = new User();
        $this->expectException(\Exception::class);
        $valid = $userTest->isValid(1, "", "vagnair", "alexandrevagnaie1@gmail.com",$this->currentDate->setTimestamp(885821386));

        $this->assertTrue($valid);
    }

    // bad lastname
    public function testUserLastnameNotValid()
    {
        $userTest = new User();
        $this->expectException(\Exception::class);
        $valid = $userTest->isValid(1, "alexandre", "", "alexandrevagnaie1@gmail.com",$this->currentDate->setTimestamp(885821386));

        $this->assertTrue($valid);
    }

    // bad email
    public function testUserEmailNotValid()
    {
        $userTest = new User();
        $this->expectException(\Exception::class);
        $valid = $userTest->isValid(1, "alexandre", "eaze", "alexandrevagnaie1gmail.com",$this->currentDate->setTimestamp(885821386));

        $this->assertTrue($valid);
    }

    // bad date born
    public function testUserBornDateNotValid()
    {
        $userTest = new User();
        $this->expectException(\Exception::class);
        $valid = $userTest->isValid(1, "alexandre", "vagnair", "alexandrevagnaie1gmail.com",$this->currentDate->setTimestamp(1556290526));

        $this->assertTrue($valid);
    }

    // bad born date type
    public function testUserBornDateNotType()
    {
        $userTest = new User();
        $this->expectException(\TypeError::class);
        $valid = $userTest->isValid(1, "alexandre", "vagnair", "alexandre.vagnair@hetic.net","azeeee");

        $this->assertTrue($valid);
    }
}
