<?php
require_once (__DIR__ . '/../Connection.php');

class EntityLogs
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
    public function getLogs(): array
    {
        $items = array();
        try {
            $request = "SELECT * FROM logs ORDER BY date";
            $result = $this->connection->query($request);
            $items = $result->fetchAll();

            return $items;
        } catch (PDOException $e) {
            return $items;
        }
    }
}