<?php

$servername = "localhost";
$username = "juliet";
$password = "Julietowah@345.com";
$mydb = "zoniac-website"; 

$conn = new mysqli($servername, $username, $password, $mydb);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>