<?php
session_start();
require_once("./connection.php");
if($_SERVER["REQUEST_METHOD"] === "DELETE"){

    $userId = $_SESSION['userId'];
    $stmt = $conn->prepare('update felhasznalo set felhasznalo.iranyitoszam=NULL, felhasznalo.utca="none", felhasznalo.cim="none" where felhasznalo.id=?;');
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>