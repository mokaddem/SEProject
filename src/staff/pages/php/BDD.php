<?php

// CLASS A VERIFIER !!!!!!!! Surement des choses à changer
class BDD extends PDO
{
    public static $db = false;
    private $database_host = '127.0.0.1';
    private $database_user = 'username';
    private $database_pass = 'verySecretPassWord';
    private $database_db = 'database';

    function __construct()
    {
        if (self::$db === false) {
            $this->connect();
        }
    }

    private function connect()
    {
        $dsn = $this->database_type . ":dbname=" . $this->database_db . ";host=" . $this->database_host;
        try {
            self::$db = new PDO($dsn, $this->database_user, $this->database_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            //your log handler
        }
    }
}