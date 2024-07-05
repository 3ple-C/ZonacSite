<?php
$servername = "localhost";
$username = "root";
$password = "";
$mydb = "zoniac-website"; 
$conn = mysqli_connect($servername, $username, $password, $mydb);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>