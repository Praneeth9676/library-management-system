<?php
$servername = "localhost";
$username = "root";  // Default MySQL username for XAMPP
$password = "";      // Default MySQL password for XAMPP (empty by default)
$dbname = "library_db";  // Your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character encoding to UTF-8
$conn->set_charset("utf8");
?>