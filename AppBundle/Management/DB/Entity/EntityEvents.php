<?php
require_once (__DIR__ . '/../Connection.php');

class EntityEvents
{
    private $connection;

    /**
     * EntityEvents constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }

    /**
     * Fetch all events
     *
     * @return array
     */
    public function getEvents(): array
    {
        $items = array();
        try {
            $request = "SELECT * FROM events";
            $result = $this->connection->query($request);
            $items = $result->fetchAll();

            return $items;
        }
        catch(PDOException $e) {
            return $items;
        }
    }
}