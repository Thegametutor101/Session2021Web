<?php

class Connection
{
    private $connection;
    public function __construct()
    {
        try {
            $this->connection = new PDO(
                "mysql:host=206.167.140.56;dbname=h2021_420626ri_gr01_équipe_6;port=3306,charset=utf8",
                "1763237",
                "1763237");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}