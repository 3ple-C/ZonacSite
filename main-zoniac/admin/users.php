<?php
include 'dbconnection.php';

echo '<div style="margin-bottom: 20px;">';
echo '<a href="home.php" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Home</a>';
echo '</div>';

$sql = "SELECT user_id, user_name, full_name, email FROM users ORDER BY date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    while ($row = $result->fetch_assoc()) {
        
        echo '<tr>';
        echo '<td>' .($row["user_id"]) . '</td>';
        echo '<td>' .($row["user_name"]) . '</td>';
        echo '<td>' .($row["full_name"]) . '</td>';
        echo '<td>' .($row["email"]) . '</td>';

        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No users found.";
}

$conn->close();

?>