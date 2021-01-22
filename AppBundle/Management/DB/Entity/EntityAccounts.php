<?php
require_once (__DIR__ . '/../Connection.php');

class EntityAccounts
{
    private $connection;

    /**
     * EntityAccounts constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }

    /**
     * Fetch all account
     *
     * @return array
     */
    public function getAccounts(): array
    {
        $items = array();
        try {
            $request = "SELECT * FROM accounts";
            $result = $this->connection->query($request);
            $items = $result->fetchAll();

            return $items;
        }
        catch(PDOException $e) {
            return $items;
        }
    }

    /**
     * Fetch specified account
     *
     * @param String $username
     * @return array
     */
    public function getAccountByUsername(string $username): array
    {
        $item = array();
        try {
            $request = "SELECT * FROM accounts WHERE username = '$username'";
            $result = $this->connection->query($request);
            $item = $result->fetch();

            return $item;
        }
        catch(PDOException $e) {
            return $item;
        }
    }
}