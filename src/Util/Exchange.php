<?php


namespace App\Util;


use Exception;
use App\Util\EmailSender;

class Exchange
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var User
     */
    private $receiver;

    /**
     * @var Product
     */
        private $product;

        /**
         * @var \DateTime
         */
        private $startDate;

        /**
         * @var \DateTime
         */
        private $endDate;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Exchange
     */
    public function setId(int $id): Exchange
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return User
     */
    public function getReceiver(): User
    {
        return $this->receiver;
    }

    /**
     * @param User $receiver
     * @return Exchange
     * @throws Exception
     */
    public function setReceiver(User $receiver): Exchange
    {
        if (!empty($receiver)) {
            $this->receiver = $receiver;
            return $this;
        }

        throw new Exception('Invalid receiver value');

    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return Exchange
     * @throws Exception
     */
    public function setProduct(Product $product): Exchange
    {
        if (!empty($product)) {
            $this->product = $product;
            return $this;
        }

        throw new Exception('Invalid product value');
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }


    /**
     * @return \DateTime
     */
    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    public function setDateInterval(array $interval): self
    {
        $startDate = $interval[0];
        $endDate = $interval[1];

        $diff = $startDate->diff($endDate);

        if ($diff->format('%R') == "+") {
            $this->startDate = $startDate;
            $this->endDate = $endDate;

            return $this;
        }

        throw new Exception('Invalide intervale date value');
    }


    /**
     * @param $id
     * @param $product
     * @param $receiver
     * @param $interval
     * @return bool
     * @throws Exception
     * EmailSender
     */
    public function isValid($id, $product, $receiver, $interval)
    {
        $exchange = new Exchange();

        $exchange->setId($id)
            ->setProduct($product)
            ->setReceiver($receiver)
            ->setDateInterval($interval)
        ;
        if($exchange->receiver->getMinor()) {
            $email = new EmailSender();
            $email->sendEmail($exchange->receiver->getEmail(), "Vous êtes mineur !");
        }

        return true;
    }

    public function save()
    {

    }
}
