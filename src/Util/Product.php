<?php


namespace App\Util;


use Exception;

class Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var User
     */
    private $owner;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Product
     */
    public function setId(int $id): Product
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Product
     * @throws Exception
     */
    public function setTitle(string $title): Product
    {
        if (!empty($title)) {
            $this->title = $title;
            return $this;
        }

        throw new Exception('Invalid title value');
    }

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     * @return Product
     * @throws Exception
     */
    public function setOwner(User $owner): Product
    {
        if (!empty($owner)) {
            $this->owner = $owner;
            return $this;
        }
        throw new Exception('Invalid owner value');
    }


    public function isValid($id, $title, $owner)
    {
        $product = new Product();

        $product->setId($id)
            ->setTitle($title)
            ->setOwner($owner)
        ;

        return true;
    }
}
