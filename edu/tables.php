<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'edu';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE eduu(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    dob DATE NOT NULL,
    phone VARCHAR(15) NOT NULL,
    pincode VARCHAR(10) NOT NULL,
    school VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === true) {
    echo("Table created successfully");
} else {
    echo("Table not created: " . $conn->error); 
}

$conn->close();
?>
