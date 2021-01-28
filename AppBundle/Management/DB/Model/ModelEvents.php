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
}