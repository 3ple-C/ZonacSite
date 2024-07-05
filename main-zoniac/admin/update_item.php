<?php
include 'dbconnection.php';

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description'])) {
    $id = intval($_POST['id']);
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $new_image = $_FILES['new_image'];
    $new_thumbnail = $_FILES['new_thumbnail'];

    // Initialize image paths
    $main_image_url = null;
    $thumbnail_url = null;

    // Handle main image upload
    if ($new_image['error'] === UPLOAD_ERR_OK) {
        $image_tmp_path = $new_image['tmp_name'];
        $image_name = basename($new_image['name']);
        $target_directory = 'uploads/';
        $main_image_url = $target_directory . uniqid('main_', true) . '.' . pathinfo($image_name, PATHINFO_EXTENSION);

        $allowed_image_types = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];
        if (in_array($new_image['type'], $allowed_image_types)) {
            if (!move_uploaded_file($image_tmp_path, $main_image_url)) {
                echo "Failed to upload main image.";
                exit();
            }
        } else {
            echo "Invalid main image type. Allowed types: JPEG, PNG, WebP, JPG.";
            exit();
        }
    }

    // Handle thumbnail upload
    if ($new_thumbnail['error'] === UPLOAD_ERR_OK) {
        $thumbnail_tmp_path = $new_thumbnail['tmp_name'];
        $thumbnail_name = basename($new_thumbnail['name']);
        $thumbnail_url = $target_directory . uniqid('thumb_', true) . '.' . pathinfo($thumbnail_name, PATHINFO_EXTENSION);

        if (in_array($new_thumbnail['type'], $allowed_image_types)) {
            if (!move_uploaded_file($thumbnail_tmp_path, $thumbnail_url)) {
                echo "Failed to upload thumbnail.";
                exit();
            }
        } else {
            echo "Invalid thumbnail type. Allowed types: JPEG, PNG, WebP, JPG.";
            exit();
        }
    }

    // Prepare SQL query
    $sql = "UPDATE items SET name = ?, description = ?";
    if ($main_image_url) {
        $sql .= ", main_image_url = ?";
    }
    if ($thumbnail_url) {
        $sql .= ", thumbnail_url = ?";
    }
    $sql .= " WHERE id = ?";

    $stmt = $conn->prepare($sql);

    // Bind parameters based on image upload status
    if ($main_image_url && $thumbnail_url) {
        $stmt->bind_param("ssssi", $name, $description, $main_image_url, $thumbnail_url, $id);
    } elseif ($main_image_url) {
        $stmt->bind_param("sssi", $name, $description, $main_image_url, $id);
    } elseif ($thumbnail_url) {
        $stmt->bind_param("sssi", $name, $description, $thumbnail_url, $id);
    } else {
        $stmt->bind_param("ssi", $name, $description, $id);
    }

    // Execute the query
    if ($stmt->execute()) {
        echo "Item updated successfully.";
    } else {
        echo "Error updating item: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "All fields are required.";
}

$conn->close();

// Redirect to the item list page after update
header("Location: products.php");
exit();
?>
