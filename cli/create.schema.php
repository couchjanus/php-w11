<?php
// Создание MySQL базы данных с помощью MySQLi
$servername = "localhost";
$username = "root";
$password = "ghbdtn";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//  Schema store
$sql = "DROP SCHEMA IF EXISTS store; CREATE SCHEMA store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
if (mysqli_multi_query($conn, $sql)) {
    echo "SCHEMA created successfully";
} else {
    echo "Error creating SCHEMA: " . mysqli_error($conn);
}

mysqli_close($conn);