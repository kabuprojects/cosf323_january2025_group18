<?php
// Database connection settings
$servername = "localhost"; // Change if your database is hosted remotely
$username = "root"; // Change to your DB username
$password = ""; // Change to your DB password
$database = "teamproject"; // Change to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Insert data into the database
    $sql = "INSERT INTO contact_messages (first_name, last_name, email, phone) VALUES ('$first_name', '$last_name', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message sent successfully!'); window.location.href='/pages/contactus.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href='/pages/contactus.php';</script>";
    }
}

// Close the connection
$conn->close();
