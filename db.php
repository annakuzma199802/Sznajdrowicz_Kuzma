<?php
$host = "localhost";
$database = "projekt1"; 
$username = "root"; 
$password = ""; 

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
