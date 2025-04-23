<?php
session_start();
require_once("./connection.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare('SELECT termekek.cim, kosar.mennyiseg, termekek.ar, termekek.kepURL, termekek.alkoto FROM termekek, kosar, felhasznalo WHERE termekek.id = kosar.termekID AND kosar.felhasznaloID = felhasznalo.id AND felhasznalo.id = ?');
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 0) {
            header('Content-Type: application/json');
            echo json_encode(['uzenet' => 'Üres a kosarad!']);
        } else {
            $kosarContents = [];
            while ($row = $result->fetch_assoc()) {
                $kosarContents[] = $row;
            }
            header('Content-Type: application/json');
            echo json_encode($kosarContents);
        }
        $stmt->close();
    } else {
        header('Content-Type: application/json');
        echo json_encode(['uzenet' => 'Hiba a lekérdezésben, nincs a sessionben id']);
    }
}
?>