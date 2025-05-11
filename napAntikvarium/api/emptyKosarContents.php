<?php 
session_start();
require_once("./connection.php");

$userId = $_SESSION['userId'];
$stmt = $conn->prepare('delete from kosar where felhasznaloID=?');
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
?>