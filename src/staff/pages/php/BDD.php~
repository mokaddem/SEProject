<?php

// CLASS A VERIFIER !!!!!!!! Surement des choses à changer
class BDD
{
	public static $db = false;
	private $database_host = '127.0.0.1';
	private $database_user = 'root';
	private $database_pass = '123';
	private $database_db = 'SEProject';

	function __construct()
	{
		if (self::$db === false) {
		    $this->connect();
		}
	}

	private function connect()
	{
	 	self::$db = mysql_connect($this->database_host,$this->database_user,$this->database_pass); 
		if (!self::$db) {
			die("Database connection failed miserably: " . mysql_error());
		}
		$db_select = mysql_select_db("SEProjectC",self::$db);
		if (!$db_select) {
			die("Database selection also failed miserably: " . mysql_error());
		}
		mysql_query("SET character_set_results=utf8", self::$db);	 
	}

	function query($sql)
	{
		return mysql_query($sql);
	}
	
}
