<?php
session_start();
if(basename($_SERVER["PHP_SELF"]) == "config.php"){
	die("Error!");
} 
//DATABASE/Server CONFIG
$host = "localhost";
$user = "root";
$pass = "";
$db = "maple"; //Your database name
$serverip         = "localhost"; 
$loginport        = "8484";
$servername 	  = "MapleEthereal";
$exp              = "1000x"; 
$meso             = "500x"; 
$drop             = "2x"; 
$version          = "v83"; 
$forums           = "#forum"; 
$hmessage		  = "Welcome! blah blah blah.";
$client			  = "http://127.0.0.1";
$setup			  = "http://127.0.0.1";
$fb				  = "http://127.0.0.1";
$twit			  = "http://127.0.0.1";
$gtop			  = "http://127.0.0.1";
//Mysqli ------------------------------------------------------------------------------------
$mysqli = new mysqli("".$host."", "".$user."", "".$pass."", "".$db."");// HostName | User | Pass | DB
if ($mysqli->connect_errno) {
    echo "<br>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
function sql_injectionproof($sCode) {
	if (function_exists("mysql_real_escape_string")) {
		$sCode = mysql_real_escape_string($sCode);
	} else {
		$sCode = addslashes($sCode);
	}
	return $sCode;
}
?>