<?php 

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "db_stampit";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
	die("Forbindelse fejlet: ".mysqli_connect_error());
}