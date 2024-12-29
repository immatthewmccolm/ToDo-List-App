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

// Create connection
$conn = new mysqli($DB_Host, $DB_User, $DB_Pass, $DB_Name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user_id from the session
$user_id = $_SESSION['id'];
$task_id = urldecode($_GET['id']);

// Prepare and execute the SQL query
$sql = "UPDATE tasks SET status = 'pending' WHERE id = $task_id";


if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php');
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();
