<?php
require_once (__DIR__ . '/../Connection.php');

class EntityMedia
{
    private $connection;

    /**
     * EntityMedia constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }

    /**
     * Fetch all media items in DB
     *
     * @return array
     */
    public function getMedia(): array
    {
        $items = array();
        try {
            $request = "SELECT * FROM media";
            $result = $this->connection->query($request);
            $items = $result->fetchAll();

            return $items;
        }
        catch(PDOException $e) {
            return $items;
        }
    }
}