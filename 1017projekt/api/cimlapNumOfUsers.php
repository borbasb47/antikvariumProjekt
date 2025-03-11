<?php
session_start();

require_once("./connection.php");
$sqlNumOfUsers = $conn->query("SELECT COUNT(email) as count FROM felhasznalo");
if ($sqlNumOfUsers) {
    $numOfUsers = $sqlNumOfUsers->fetch_assoc()['count'];
    echo json_encode(['count' => $numOfUsers]);
} else {
    echo json_encode(['hiba' => $conn->error]);
}
?>