<?php
session_start();

require_once("./connection.php");

$jsonProductData = file_get_contents('php://input');

$ProductData = json_decode($jsonProductData, true);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if (isset($ProductData['itemId'], $ProductData['itemAmount'], $_SESSION['userId'])) {
        $userId=$_SESSION['userId'];
        $itemId=$ProductData['itemId'];
        $itemAmount=$ProductData['itemAmount'];
        $insertIntoKosar=$conn->query("insert into kosar(felhasznaloID, termekID, mennyiseg) VALUES($userId, $itemId, $itemAmount)");
        if($insertIntoKosar){
            header("Content-Type: application/json");
            $feedback["uzenet"]="Sikeresen hozzáadtad a kosárhoz!";
            echo json_encode($feedback);
        }
        else{
            header("Content-Type: application/json");
            $feedback["uzenet"]="Nem sikerült hozzáadni a kosárhoz!";
            echo json_encode($feedback);
        }
    }
}
?>