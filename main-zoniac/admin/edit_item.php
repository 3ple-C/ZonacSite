<?php
include 'dbconnection.php';  // Ensure this file contains your database connection code
echo '<div style="margin-bottom: 20px;">';
echo '<a href="products.php" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">products</a>';
echo '</div>';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT id, name, description, main_image_url, thumbnail_url FROM items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "No ID provided for editing.";
    exit();
}
?>

<form action="update_item.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>
    <br>
    <label for="image">Current Image:</label>
    <img src="<?php echo htmlspecialchars($item['main_image_url']); ?>" alt="Current Image" width="100">
    <br>
    <label for="thumbnail">Current Thumbnail:</label>
    <img src="<?php echo htmlspecialchars($item['thumbnail_url']); ?>" alt="Current Thumbnail" width="50">
    <br>
    <label for="new_image">New Main Image (optional):</label>
    <input type="file" name="new_image">
    <br>
    <label for="new_thumbnail">New Thumbnail (optional):</label>
    <input type="file" name="new_thumbnail">
    <br>
    <input type="submit" value="Update">
</form>
