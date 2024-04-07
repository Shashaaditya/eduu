<?php
// Establish connection to the MySQL database
$servername = "localhost"; // Change if your MySQL server is hosted elsewhere
$username = "root";
$password = ""; // Replace with your MySQL password
$dbname = "edu"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];
    $pincode = $_POST["pincode"];
    $school = $_POST["school"];
    $password = $_POST["password"];

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO eduu (username, email, gender, dob, phone, pincode, school, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $username, $email, $gender, $dob, $phone, $pincode, $school, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

header("Location: login.html");
exit();
?>
