<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12743167";
$password = "k6GaL5xICF";
$dbname = "sql12743167";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
