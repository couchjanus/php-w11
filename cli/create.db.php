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
// DROP SCHEMA IF EXISTS `store`;
// Schema store
// CREATE SCHEMA IF NOT EXISTS `store` DEFAULT CHARACTER SET utf8 ;
// USE `store`;

// Create database CREATE DATABASE IF NOT EXISTS store;
$sql = "DROP DATABASE IF EXISTS store; CREATE DATABASE store;";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);