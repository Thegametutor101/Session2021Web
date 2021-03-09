<?php
require_once(__DIR__ . '/../Connection.php');

class ModelLinks
{
    private $connection;

    /**
     * ModelLinks constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }

    public function addLink(string $name, string $description, string $lien): bool
    {
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO LINKS ( name, description, link ) 
                        VALUES (:name, :description, :link)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':link', $lien);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public function editLink(string $name, string $description, $lien, $id): bool
    {
        try {
            $stmt = $this->connection->prepare(
                "UPDATE LINKS SET name=:name,description = :description,link = :link WHERE ID = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':link', $lien);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteLink(int $id): bool
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM LINKS WHERE ID = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}