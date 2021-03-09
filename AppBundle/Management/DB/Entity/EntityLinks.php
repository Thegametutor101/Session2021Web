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
    public function getLink($id)
    {

        try {
            $request = $this->connection->prepare("SELECT * FROM links where ID = :id ");
            $request->bindParam(':id', $id);
            $request->execute();
            $result = $request->fetch(PDO::FETCH_ASSOC);
            echo json_encode($result);

        }
        catch(PDOException $e) {
            return $e;
        }
    }
}