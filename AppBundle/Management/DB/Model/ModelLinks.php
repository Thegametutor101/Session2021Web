<?php
require_once (__DIR__ . '/../Connection.php');

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
}