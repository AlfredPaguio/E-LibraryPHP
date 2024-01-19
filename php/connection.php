<?php
// this database is deleted so don't worry
// $host = "sql212.epizy.com"; // MySQL host name eg. localhost
//  $user = "epiz_29797024"; // MySQL user. eg. root ( if your on localserver)
// $password = "ddNB5ZRUFkj9"; // MySQL user password  (if password is not set for your root user then keep it empty )
// $db = "epiz_29797024_elibrary"; // MySQL Database name

$host = "localhost";
$user = "root";
$password = "";
$db = "elibrary";

//for MySQLi Procedural
$con = mysqli_connect($host, $user, $password, $db);
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
