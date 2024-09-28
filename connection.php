<?php

// Define your variables
$dbhost = "127.0.0.1";
$dbuser = "admin";
$dbpass = "taitaja2023";
$dbname = "login_users_db";

// Create a connection
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Set charset to utf8mb4 for better compatibility
$con->set_charset("utf8mb4");
?>