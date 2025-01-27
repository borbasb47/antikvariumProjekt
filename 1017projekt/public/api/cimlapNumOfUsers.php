<?php
require_once("connection.php");

$result = $conn->query("SELECT COUNT(email) as count FROM felhasznalo");
if ($result) {
    $numOfUsersRow = $result->fetch_assoc();
    $numOfUsers = $numOfUsersRow['count'];
    echo json_encode(['count' => $numOfUsers]);
} else {
    echo json_encode(['error' => $conn->error]);
}
?>