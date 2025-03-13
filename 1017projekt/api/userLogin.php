<?php
session_start();

require_once("./connection.php");

$jsonUserData = file_get_contents('php://input');

$userData = json_decode($jsonUserData, true);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if (isset($userData['email']) && isset($userData['password'])) {
        $email = $userData['email']; 
        $password = $userData['password'];
        $emailExistCheck="select * from felhasznalo where email='$email'";
        $emailExistCheckResult=$conn->query($emailExistCheck);
        if($emailExistCheckResult->num_rows==0){
            http_response_code(404);
            header("Content-Type: application/json");
            echo json_encode(['uzenet' => 'Sikertelen bejelentkezés, hibás e-mail vagy jelszó']);        
        }
        else{
            $row = $emailExistCheckResult->fetch_assoc();
            $correctPassword=$row['jelszo'];
            $isPasswordMatching=password_verify($password,$correctPassword);
            if($isPasswordMatching==true){
                //sleep(seconds: 0.3);
                $_SESSION['email']=$email;
                //header("Location: /1017projekt/views/fooldal.html");
                echo json_encode(['uzenet' => 'Sikeres bejelentkezés']);
                $loginAdd=$conn->query("update felhasznalo set felhasznalo.bejelentkezesekSzama=felhasznalo.bejelentkezesekSzama+1 WHERE felhasznalo.email='$email'");
            }
        }
    }
}