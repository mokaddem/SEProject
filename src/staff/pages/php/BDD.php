<?php
	error_reporting(E_ALL ^ E_STRICT);
// CLASS A VERIFIER !!!!!!!! Surement des choses à changer
	function BDconnect(){
                $database_host = 'localhost';
                $database_user = 'root';
                $database_pass = '123';
                $database_db = 'SEProjectC';	
                $db = new mysqli($database_host, $database_user, $database_pass, $database_db);
                if ($db->connect_error) {
                        $database_host = 'test.pydehon.me';
                        $database_user = 'team';
                        $database_pass = 'seprojectc';
                        $database_db = 'SEProjectC';
                        $db = new mysqli($database_host, $database_user, $database_pass, $database_db);
                        if ($db->connect_error) {
                            die("Database connection failed miserably: " . $db->connect_error);
                        }
                }
		return $db;
	}

