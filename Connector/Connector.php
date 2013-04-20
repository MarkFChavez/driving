<?php

class Connector {
	
	function __construct() {
		$properties = parse_ini_file("config/dbcon.ini");
		
		if($db = mysql_connect($properties['host'], $properties['user'],$properties['pass']) or die($this->write_log("Error Connecting to Database: ".mysql_error())))
		{
			mysql_select_db($properties['database'], $db) or die($this->write_log("Error Connecting to Database: ".mysql_error()));
		}
	}
}