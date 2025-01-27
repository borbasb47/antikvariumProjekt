<?php
require_once("./connection.php");

$sql = $conn->query("SELECT COUNT(email) as count FROM felhasznalo");
if ($sql) {
    $numOfUsers = $sql->fetch_assoc()['count'];
    echo json_encode(['count' => $numOfUsers]);
} else {
    echo json_encode(['error' => $conn->error]);
}
?>