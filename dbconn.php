<?php
session_start();
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "shop"; // Replace "your_database_name" with the actual name of your database

// Create connection
$con = mysqli_connect($dbservername, $dbusername, $dbpassword);

// Check connection
if (!$con) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
}

// Select database
if (!mysqli_select_db($con, $dbname)) {
    die("Failed to select database: " . mysqli_error($con));
}

// Rest of your code...
?>
