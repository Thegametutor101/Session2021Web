<?php
require_once (__DIR__ . '/../Connection.php');

class ModelItemList
{
    private $connection;

    /**
     * ModelItemList constructor.
     */
    public function __construct()
    {
        $class = new Connection();
        $this->connection = $class->getConnection();
    }
}