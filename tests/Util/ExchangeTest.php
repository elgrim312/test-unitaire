<?php


namespace App\Tests\Util;


use App\Util\DBConnection;
use App\Util\Exchange;
use App\Util\Product;
use App\Util\User;
use App\Util\EmailSender;
use PHPUnit\Framework\TestCase;

class ExchangeTest extends TestCase
{
    private $currentDate;

    private $validDateInterval;

    private $noValidDateInterval;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->currentDate = new \DateTime();
        // 05 mais --> 05 aout
        $this->validDateInterval = [new \DateTime(), $this->currentDate->setTimestamp(1565109564 )];
        // 05 aout --> 05 mai
        $this->noValidDateInterval = [$this->currentDate->setTimestamp(1565109564 ), new \DateTime()];
        parent::__construct($name, $data, $dataName);
    }

    public function testExchangeIsValid()
    {
        $exchangeTest = new Exchange();
        $valid = $exchangeTest->isValid(1, $this->mockProduct(), $this->mockUser(), $this->validDateInterval);
        $this->assertTrue($valid);

        $db = new DBConnection();
        $valid = $db->save($this->mockExchange());

        $this->assertTrue($valid);
    }

    public function testExchangeIdNotValid()
    {
        $exchangeTest = new Exchange();
        $this->expectException(\TypeError::class);
        $valid = $exchangeTest->isValid("z",$this->mockProduct(), $this->mockUser(), $this->validDateInterval);

        $this->assertTrue($valid);
    }


    public function testExchangeProductNotValid()
    {
        $exchangeTest = new Exchange();
        $this->expectException(\TypeError::class);
        $valid = $exchangeTest->isValid(1,"", $this->mockUser(),  $this->validDateInterval);

        $this->assertTrue($valid);
    }


    public function testExchangeUserNotValid()
    {
        $exchangeTest = new Exchange();
        $this->expectException(\TypeError::class);
        $valid = $exchangeTest->isValid(1,$this->mockProduct(), null, $this->validDateInterval);

        $this->assertTrue($valid);
    }

    public function testExchangeInterValDateNotValid()
    {
        $exchangeTest = new Exchange();
        $this->expectException(\Exception::class);
        $valid = $exchangeTest->isValid(1, $this->mockProduct(), $this->mockUser(),  $this->noValidDateInterval);

        $this->assertTrue($valid);
    }

    public function mockProduct()
    {
        $mock = $this->createMock(Product::class);

        $mock->method('isValid')->willReturn($mock);

        return $mock;
    }

    public function mockUser()
    {
        $mock = $this->createMock(User::class);

        $mock->method('isValid')->willReturn($mock);

        return $mock;
    }


    public function mockExchange()
    {
        $mock = $this->createMock(Exchange::class);

        return $mock;
    }

    public function checkIfEmailWork() {
        $email = new EmailSender();
        $valid = $email->sendEmail("toto@gmail.com", "email sent");
        $this->assertTrue($valid);
    }

    public function testIfDbConnectionWork()
    {
        $dbConnection = new DBConnection();
        $valid = $dbConnection->save($this->mockExchange());

        $this->assertTrue($valid);
    }
}
