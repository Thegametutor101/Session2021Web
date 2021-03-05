<?php
require_once (__DIR__ . '/../Connection.php');

class ModelActivities
{
    private $connection;

    /**
     * ModelActivities constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }

    /**
     * Insert Item to Activity Table
     * @param string $name
     * @param string $description
     * @param $location
     * @param $dateStart
     * @param $dateEnd
     * @param int $maxCapacity
     * @return string
     */
    public function addActivity(string $name,
                                string $description,
                                $location,
                                $dateStart,
                                $dateEnd,
                                int $maxCapacity): string
    {
        try {
            $request = "INSERT INTO activities (name, description, location, dateStart, dateEnd, maxCapacity) 
                        VALUES(:name, :description, :location, :dateStart, :dateEnd, :maxCapacity)";

            $declaration = $this->connection->prepare($request);
            $declaration->bindParam(':name', $name);
            $declaration->bindParam(':description', $description);
            $declaration->bindParam(':location', $location);
            $declaration->bindParam(':dateStart', $dateStart);
            $declaration->bindParam(':dateEnd', $dateEnd);
            $declaration->bindParam(':maxCapacity', $maxCapacity);

            $declaration->execute();

            return "success";
        }
        catch(PDOException $e) {
            return $e;
        }
    }

    /**
     * Insert Item to Activity Table
     * @param int $id
     * @param string $name
     * @param string $description
     * @param $location
     * @param $dateStart
     * @param $dateEnd
     * @param int $maxCapacity
     * @return string
     */
    public function updateActivity(int $id,
                                   string $name,
                                   string $description,
                                   $location,
                                   $dateStart,
                                   $dateEnd,
                                   int $maxCapacity): string
    {
        try {
            $request = "UPDATE activities
                        SET name = :name, 
                            description =  :description, 
                            location = :location, 
                            dateStart = :dateStart, 
                            dateEnd = :dateEnd, 
                            maxCapacity = :maxCapacity
                        WHERE id = '$id'";

            $declaration = $this->connection->prepare($request);
            $declaration->bindParam(':name', $name);
            $declaration->bindParam(':description', $description);
            $declaration->bindParam(':location', $location);
            $declaration->bindParam(':dateStart', $dateStart);
            $declaration->bindParam(':dateEnd', $dateEnd);
            $declaration->bindParam(':maxCapacity', $maxCapacity);

            $declaration->execute();

            return "success";
        }
        catch(PDOException $e) {
            return "error";
        }
    }
}