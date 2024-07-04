<?php
include('dbconnection.php');
session_start(); // Start the session

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $user_name = $_POST['user_name'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  // Check if any required fields are empty
  if (empty($user_name) || empty($full_name) || empty($email) || empty($password)) {
    $_SESSION['error'] = 'Please fill in all the required fields.';
    header("Location: reg_form.php");
    exit();
  }

  // Check if email already exists
  $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($check_email_sql);
  
  if ($result->num_rows > 0) {
    $_SESSION['error'] = 'Email already exists. Please choose a different email.';
    header("Location: reg_form.php");
    exit();
  }

  // Insert user data into the users table
  $sql = "INSERT INTO users (user_name, full_name, email, password, date) VALUES ('$user_name', '$full_name', '$email', '$password', NOW())";
  
  if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = 'Record inserted successfully';
    header("Location: index.php");
    exit();
  } else {
    $_SESSION['error'] = 'Error: ' . $sql . '<br>' . $conn->error;
    header("Location: reg_form.php");
    exit();
  }
}
?>