<?php
require_once("/1017projekt/api/connection.php");

$jsonUserData = file_get_contents('php://input');

$userData = json_decode($jsonData, true);

if (isset($userData['email']) && isset($userData['password'])) {
    $email = $userData['email']; 
    $password = $userData['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sqlInsertDatas = "INSERT INTO felhasznalo(email, jelszo) VALUES ('$email', '$hashedPassword')";
    
    if ($conn->query($sqlInsertDatas) === TRUE) {
        echo "<h2 style='color:green'>Sikeres regisztráció!</h2>";
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else {
        echo "Hiba: " . $conn->error;
    }
} else {
    echo "Hiányos adatok";
}
