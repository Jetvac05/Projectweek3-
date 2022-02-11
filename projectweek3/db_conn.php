<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "a";
$dbName = "projectweek3";

$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$dbConn) {
	echo "Connection failed!";
}