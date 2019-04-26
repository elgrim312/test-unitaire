<?php


namespace App\Util;


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
    private $user;

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
     */
    public function setTitle(string $title): Product
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Product
     */
    public function setUser(User $user): Product
    {
        $this->user = $user;
        return $this;
    }


    public function isValid($id, $title, $user)
    {
        $product = new Product();

        $product->setId($id)
            ->setTitle($title)
            ->setUser($user)
        ;

        return $product;
    }
}
