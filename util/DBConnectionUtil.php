<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "shopdientu";

$mysqli = new mysqli($server, $username, $password, $dbname);

$mysqli->set_charset("utf8");

if (mysqli_connect_errno()) {
	echo "Loi ket noi database: " . mysqli_connect_error();
	exit();
}
