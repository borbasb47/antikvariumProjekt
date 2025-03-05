<?php
$servername="localhost";
$username = "root";
$password ="";
$dbname="antikvarium";

$conn=new mysqli($servername, $username, $password, $dbname);

mysqli_set_charset($conn,"UTF8");
if ($conn->connect_error) {
   die("A csatlakozás sikertelen volt: " . $conn->connect_error);
}