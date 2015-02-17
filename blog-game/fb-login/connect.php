<?php
$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "blog-game";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>