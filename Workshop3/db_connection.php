<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workshop3";

// open Connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}