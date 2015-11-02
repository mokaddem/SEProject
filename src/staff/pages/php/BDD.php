<?php
	error_reporting(E_ALL ^ E_STRICT);
// CLASS A VERIFIER !!!!!!!! Surement des choses à changer
class BDD extends mysqli
{
	public static $db = false;
	private $database_host = '127.0.0.1';
	private $database_user = 'root';
	private $database_pass = '123';
	private $database_db = 'SEProjectC';
	function __construct()
	{
		if (self::$db === false) {
		    $this->connect();
		}
	}
	public function connect()
	{
		self::$db = new mysqli($this->database_host, $this->database_user, $this->database_pass, $this->database_db);
		if (!self::$db) {
			die("Database connection failed miserably: " . mysqli_error());
		}
		self::$db->query("SET character_set_results=utf8");	 
	}

	function query($sql)
	{ 
		return self::$db->query($sql);
	}
}
