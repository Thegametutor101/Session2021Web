<?php
require_once (__DIR__ . '/../Connection.php');

class ModelAccounts
{
    private $connection;

    /**
     * ModelAccounts constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }

    /**
     * Insert Item to Accounts Table
     * @param string $username
     * @param string $password
     * @return string
     */
    public function addAccount(string $username, string $password)
    {
        try {
            $request = "INSERT INTO accounts VALUES(:username, :password)";

            $declaration = $this->connection->prepare($request);
            $declaration->bindParam(':username', $username);
            $declaration->bindParam(':password', $password);

            $declaration->execute();

            return "success";
        } catch (PDOException $e) {
            return "error";
        }
    }

    public function deleteAccount(string $username)
    {
        try {
            $request = "DELETE FROM accounts WHERE username=:username";

            $declaration = $this->connection->prepare($request);
            $declaration->bindParam(':username', $username);

            $declaration->execute();

            return "success";
        } catch (PDOException $e) {
            return "error";
        }
    }

    public function updateAccount(string $username, string $password)
    {
        try {
            $request = "UPDATE accounts SET password=:password WHERE username=:username;";

            $declaration = $this->connection->prepare($request);
            $declaration->bindParam(':username', $username);
            $declaration->bindParam(':password', $password);

            $declaration->execute();

            return "success";
        } catch (PDOException $e) {
            return "error";
        }
    }
}