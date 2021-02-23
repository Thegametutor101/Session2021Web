<?php
require_once (__DIR__ . '/../Connection.php');

class ModelEvents
{
    private $connection;

    /**
     * ModelEvents constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }

    /**
     * @param string $name
     * @param string $description
     * @param $location
     * @param $dateStart
     * @param $dateEnd
     * @param $maxCapacity
     * @return bool
     */
    public function addEVent(string $name, string $description, $location, $dateStart, $dateEnd, $maxCapacity): bool
    {
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO EVENTS ( name, description, location, dateStart, dateEnd, maxCapacity) 
                        VALUES (:name, :description, :location, :dateStart, :dateEnd, :maxCapacity)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':location', $location);
            $stmt->bindParam(':dateStart', $dateStart);
            $stmt->bindParam(':dateEnd', $dateEnd);
            $stmt->bindParam(':maxCapacity', $maxCapacity);
            $stmt->execute();
            echo true;
        } catch (PDOException $e) {
            echo false;
        }
    }
}