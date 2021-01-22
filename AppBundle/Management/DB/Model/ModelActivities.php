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
}