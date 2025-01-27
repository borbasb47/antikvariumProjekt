<?php
$servername="localhost";
$username = "root";
$password ="";
$dbname="antikvarium";

$conn=new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("A csatlakozás sikertelen volt: " . $conn->connect_error);
}