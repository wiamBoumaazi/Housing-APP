<?php
$servername = "localhost";
$username = "root";
$password = "";
<<<<<<< HEAD
$dbname = "hillowdb";

=======

$dbname = "hillowsdtest";

// Create connection
>>>>>>> f8d51d6665fee5e8ef500778f299759b72f7c818

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} ?>