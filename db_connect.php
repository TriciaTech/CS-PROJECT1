<?php
$servername = "localhost";     // The server where MariaDB is running
$username = "root";    // Database username (e.g., project_user)
$password = "root";    // Database user password
$dbname = "CAT1";               // Database name (CAT1)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
