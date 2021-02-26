<?php
require_once (__DIR__ . '/../Connection.php');

class ModelLogs
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
     * @return list
     */
    public function selectAllCroissant(): bool
    {
        try {
            $stmt = $this->connection->prepare(
                "SELECT * FROM logs");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($results);
        } catch (PDOException $e) {
            echo json_encode($e);
        }
    }
}
?>