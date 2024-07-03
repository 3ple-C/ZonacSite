<?php
// Connect to the database
include "dbconnection.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize the form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $description = htmlspecialchars(trim($_POST["description"]));

    // Initialize paths
    $main_image_path = null;
    $thumbnail_path = null;

    // Create the uploads folder if it doesn't exist
    $upload_dir = 'uploads/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Allowed file types
    $allowed_types = ['jpg', 'jpeg', 'png', 'webp'];

    // Handle main image upload
    if (isset($_FILES["main_image_url"]) && $_FILES["main_image_url"]["error"] === UPLOAD_ERR_OK) {
        $main_image = $_FILES["main_image_url"];
        $main_image_ext = strtolower(pathinfo($main_image["name"], PATHINFO_EXTENSION));
        $main_image_name = uniqid('main_', true) . '.' . $main_image_ext;
        $main_image_path = $upload_dir . $main_image_name;

        // Validate file type
        if (in_array($main_image_ext, $allowed_types)) {
            if (!move_uploaded_file($main_image["tmp_name"], $main_image_path)) {
                echo "Failed to upload the main image.";
                exit;
            }
        } else {
            echo "Invalid file type for main image. Allowed types: " . implode(", ", $allowed_types);
            exit;
        }
    } else {
        echo "No main image uploaded.";
        exit;
    }

    // Handle thumbnail upload
    if (isset($_FILES["thumbnail_url"]) && $_FILES["thumbnail_url"]["error"] === UPLOAD_ERR_OK) {
        $thumbnail_image = $_FILES["thumbnail_url"];
        $thumbnail_ext = strtolower(pathinfo($thumbnail_image["name"], PATHINFO_EXTENSION));
        $thumbnail_name = uniqid('thumb_', true) . '.' . $thumbnail_ext;
        $thumbnail_path = $upload_dir . $thumbnail_name;

        // Validate file type
        if (in_array($thumbnail_ext, $allowed_types)) {
            if (!move_uploaded_file($thumbnail_image["tmp_name"], $thumbnail_path)) {
                echo "Failed to upload the thumbnail.";
                exit;
            }
        } else {
            echo "Invalid file type for thumbnail. Allowed types: " . implode(", ", $allowed_types);
            exit;
        }
    } else {
        echo "No thumbnail uploaded.";
        exit;
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO items (name, description, main_image_url, thumbnail_url, created_at) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
        exit;
    }

    // Bind the parameters
    $stmt->bind_param("ssss", $name, $description, $main_image_path, $thumbnail_path);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Product created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
