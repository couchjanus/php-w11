<?php

$servername = "localhost";
$username = "root";
$password = "ghbdtn";
$dbname = "store";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);
/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
echo "Connected successfully\n\n";

// Create sql
$sql = "INSERT INTO guestbook (username, email, comment)
VALUES ('John', 'john@example.com', 'Hi, It is John Doe');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
