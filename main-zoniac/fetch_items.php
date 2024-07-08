<?php
header('Content-Type: application/json');
include('dbconnection.php');

$items = [];
$sql = "SELECT id, name, description, main_image_url, created_at FROM items ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'main_image_url' => 'admin/' . $row['main_image_url'],
            'thumbnail_url' => 'admin/' . $row['thumbnail_url']
        ];
    }
}

$conn->close();
echo json_encode($items);
?>
