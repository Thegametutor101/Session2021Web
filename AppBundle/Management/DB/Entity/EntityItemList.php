<?php
require_once (__DIR__ . '/../Connection.php');

class EntityItemList
{
    private $connection;

    /**
     * EntityItemList constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }

    /**
     * Fetch all Item Lists
     *
     * @return array
     */
    public function getItemLists(): array
    {
        $items = array();
        try {
            $request = "SELECT * FROM itemlist";
            $result = $this->connection->query($request);
            $items = $result->fetchAll();

            return $items;
        }
        catch(PDOException $e) {
            return $items;
        }
    }
}