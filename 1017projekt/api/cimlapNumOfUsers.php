<?php
require_once("/1017projekt/api/connection.php");
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $sqlNumOfUsers = $conn->query("SELECT COUNT(email) as count FROM felhasznalo");
    if ($sqlNumOfUsers) {
        $numOfUsers = $sqlNumOfUsers->fetch_assoc()['count'];
        echo json_encode(['count' => $numOfUsers]);
    } else {
        echo json_encode(['hiba' => $conn->error]);
    }
}
?>