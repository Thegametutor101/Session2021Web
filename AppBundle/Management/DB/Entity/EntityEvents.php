<?php
require_once(__DIR__ . '/../Connection.php');

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
        } catch (PDOException $e) {
            return $items;
        }
    }

    public function getEvent(int $id)
    {
        try {
            $request = $this->connection->prepare("SELECT * FROM events where ID = :id ");
            $request->bindParam(':id', $id);
            $request->execute();
            $result = $request->fetch(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } catch (PDOException $e) {
            return $e;
        }
    }
}