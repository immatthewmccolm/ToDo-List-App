<?php
// Start the session
session_start();

// Check if the user is signed in
if (!isset($_SESSION['username'])) {
    // If not signed in, redirect to the login page
    header('Location: login.php');
    exit();
}
// Include database credentials
include_once('../creds.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $newtitle = $_POST['title'];
    $task_id = $_POST['id'];

    // Your existing code for handling the signup process
}

// Create connection
$conn = new mysqli($DB_Host, $DB_User, $DB_Pass, $DB_Name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user_id from the session
$user_id = $_SESSION['id'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("UPDATE tasks SET title = ? WHERE id = ? AND user_id = ?");
$stmt->bind_param("sii", $newtitle, $task_id, $user_id);


if ($stmt->execute() === TRUE) {
    header('Location: ../index.php');
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();

  ?>

