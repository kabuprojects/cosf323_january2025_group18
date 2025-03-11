<?php
$host = "localhost";
$dbname = "teamproject";
$username = "root";  // Change this if necessary
$password = "";      // Change this if necessary

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
