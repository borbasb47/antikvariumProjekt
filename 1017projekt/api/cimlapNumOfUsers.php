<?php
require_once("../api/connection.php");

$sqlNumOfUsers = $conn->query("SELECT COUNT(email) as count FROM felhasznalo");
if ($sqlNumOfUsers) {
    $numOfUsers = $sqlNumOfUsers->fetch_assoc()['count'];
    echo json_encode(['count' => $numOfUsers]);
} else {
    echo json_encode(['error' => $conn->error]);
}
?>