<?php
include_once('../creds.php');

// Create connection
$conn = new mysqli($DB_Host, $DB_User, $DB_Pass, $DB_Name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $name = $_POST['Name'];
    $email = $_POST['username'];
    $password = $_POST['Password'];

    // Your existing code for handling the signup process
}

// Hash the users password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password_hash, Name) VALUES ('$email', '$hashed_password', '$name')";

if ($conn->query($sql) === TRUE) {
    header('Location: ../login.php?s=success');
  } else {
    header('Location: ../signup.php?s=fail&e=' . urlencode($stmt->error));
    }
?>