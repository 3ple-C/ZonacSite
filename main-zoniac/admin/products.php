<?php
include 'dbconnection.php';

echo '<div style="margin-bottom: 20px;">';
echo '<a href="home.php" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Home</a>';
echo '</div>';

$sql = "SELECT id, name, main_image_url FROM items ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    while ($row = $result->fetch_assoc()) {
        
        echo '<tr>';
        echo '<td><img src="' . htmlspecialchars($row["main_image_url"]) . '" alt="Product Image" width="50"></td>';
        echo '<td>' . htmlspecialchars($row["name"]) . '</td>';
        echo '<td><a href="delete.php?id=' . $row["id"] . '" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a></td>';
        echo '<td><a href="edit_item.php?id=' . $row["id"] . '">Edit</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No products found.";
}

$conn->close();
?>
