<?php

namespace AppBundle\Management\DB\Entity;

use AppBundle\Management\DB\Connection;
use PDO;
use PDOException;

class EntityAccounts
{
    private string $username, $password;
    private PDO $connection;

    /**
     * EntityAccounts constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }

    /**
     * @return String
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param String $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return String
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * Fetch specified account
     *
     *  @param String $username
     */
    public function getAccountByUsername(string $username)
    {
        try {
            $request = "SELECT * FROM accounts WHERE username = '$username'";
            $result = $this->connection->query($request);
            $item = $result->fetchAll();

            $this->setUsername($item['username']);
            $this->setPassword($item['password']);
        }
        catch(PDOException $e) {
            $this->setUsername('invalid');
            $this->setPassword('invalid');
        }
    }
}