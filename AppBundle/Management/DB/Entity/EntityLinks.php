<?php
require_once (__DIR__ . '/../Connection.php');

class EntityLinks
{
    private $connection;

    /**
     * EntityLinks constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }

    /**
     * Fetch all links
     *
     * @return array
     */
    public function getLinks(): array
    {
        $items = array();
        try {
            $request = "SELECT * FROM links";
            $result = $this->connection->query($request);
            $items = $result->fetchAll();

            return $items;
        }
        catch(PDOException $e) {
            return $items;
        }
    }
}