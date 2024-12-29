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
    $email = $_POST['email'];
    $password = $_POST['Password'];

    // Your existing code for handling the signup process
}

$sql = "SELECT * FROM users WHERE username = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $name = $row["Name"];
      $idnumber = $row["id"];
      $hashword = $row["password_hash"];
      $email = $row["username"];
    }
  } else {
    header('Location: ../login.php?s=none');
  }

if (password_verify($password, $hashword)) {
    session_start();
    $_SESSION['username'] = $email;
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $idnumber;

    header('Location: ../index.php');
  } else {
    header('Location: ../login.php?s=none');
  }
?>