<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <!-- form.html -->
<form action="items.php" method="POST" enctype="multipart/form-data">
<label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="main_image_url">Main Image:</label>
        <input type="file" id="main_image_url" name="main_image_url" accept="image/jpeg, image/png, image/webp" required>

        <label for="thumbnail_url">Thumbnail:</label>
        <input type="file" id="thumbnail_url" name="thumbnail_url" accept="image/jpeg, image/png, image/webp" required>

    <input type="submit" value="Submit">
</form>

</body>
</html>