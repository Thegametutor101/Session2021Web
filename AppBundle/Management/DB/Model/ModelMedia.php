<?php
require_once (__DIR__ . '/../Connection.php');

class ModelMedia
{
    private $connection;

    /**
     * ModelMedia constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }
}