<?php

$servername = "localhost";
$username = "YourUsername";
$password = "YourPassword";
$dbname = "YourProjectName";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
