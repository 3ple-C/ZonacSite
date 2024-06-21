<?php
$servername = "localhost";
$username = "juliet";
$password = "Julietowah@345.com";
$mydb = "zoniac-website"; 
$conn = mysqli_connect($servername, $username, $password, $mydb);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>