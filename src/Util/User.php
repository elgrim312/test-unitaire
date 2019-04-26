<?php


namespace App\Util;


use Exception;

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $bornDate;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname(string $firstname): User
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname(string $lastname): User
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     * @throws Exception
     */
    public function setEmail(string $email): User
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) != false) {
            $this->email = $email;

            return $this;
        }

        throw new Exception('Invalid email format');
    }

    /**
     * @return \DateTime
     */
    public function getBornDate(): \DateTime
    {
        return $this->bornDate;
    }

    /**
     * @param \DateTime $bornDate
     * @return User
     * @throws Exception
     */
    public function setBornDate(\DateTime $bornDate): User
    {
        $currentDate = new \DateTime();
        $currentDate->sub(new \DateInterval('P13Y'));
        $interval = $bornDate->diff($currentDate);

        if ($interval->format('%R') == '+' ) {
            $this->bornDate = $bornDate;
            return $this;
        }

        throw new Exception('Invalide born date value');

    }

    public function isValid($id, $firstname, $lastname, $email, $bornDate)
    {
        $user = new User();

        $user->setId($id);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setEmail($email);
        $user->setBornDate($bornDate);

        return $user;
    }
}
