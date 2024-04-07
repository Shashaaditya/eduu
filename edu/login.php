<?php
// Establish connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare SQL statement
    $sql = "SELECT * FROM eduu WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Preparation failed: " . $conn->error);
    }

    // Bind parameter
    $stmt->bind_param("s", $username);

    // Execute statement
    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }

    // Store result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // Fetch user row
        $row = $result->fetch_assoc();
        
        // Verify password
        if ($password === $row['password']) {
            // Password correct, redirect to dashboard or homepage
            header("Location: home.html");
            exit();
        } else {
            // Password incorrect, display error message
            echo "Incorrect password";
        }
    } else {
        // User not found, display error message
        echo "User not found";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
