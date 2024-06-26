<?php
// Include the database connection file
include('dbconnection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form inputs
    $user_name = trim($_POST['user_name']);
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Input validation
    $errors = [];

    // Check if username is valid
    if (empty($user_name)) {
        $errors[] = "Username is required";
    }

    // Check if full name is valid
    if (empty($full_name)) {
        $errors[] = "Full name is required";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    // If no errors, proceed to insert into database
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (user_name, full_name, email, password, date) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $user_name, $full_name, $email, $hashed_password);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: index.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }

    // Close the database connection
    $conn->close();
}
?>
