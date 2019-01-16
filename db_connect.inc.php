<?php 

$servername = "markh.dk.mysql";
$dbUsername = "markh_dk_db_stampit";
$dbPassword = "StampIt";
$dbName = "markh_dk_db_stampit";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
	die("Forbindelse fejlet: ".mysqli_connect_error());
}