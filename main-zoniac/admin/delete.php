<?php
include 'dbconnection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Item deleted successfully.";
    } else {
        echo "Error deleting item: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "No ID provided for deletion.";
}

$conn->close();

// Redirect to the item list page after deletion
header("Location: products.php");
exit();
?>
