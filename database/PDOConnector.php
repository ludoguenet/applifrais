<?php

namespace Database;

class PDOConnector extends \PDO
{
    private const HOSTNAME = "localhost";
    private const DBNAME = "applifrais";
    private const LOGIN = "root";
    private const PASSWORD = "";

    private static ?self $_instance = null;

    private function __construct()
    {
        $dsn = 'mysql:host=' . self::HOSTNAME . ';dbname=' . self::DBNAME;
        parent::__construct($dsn, self::LOGIN, self::PASSWORD);
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}