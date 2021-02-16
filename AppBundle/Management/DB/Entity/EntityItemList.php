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
     * @param $id
     * @return array
     */
    public function getItemLists($id): array
    {
        $items = array();
        try {
            $request = "SELECT * FROM itemlist WHERE id='$id'";
            $result = $this->connection->query($request);
            $items = $result->fetchAll();

            return $items;
        }
        catch(PDOException $e) {
            return $items;
        }
    }
}