<?php
require_once("./connection.php");

$jsonUserData = file_get_contents('php://input');

$userData = json_decode($jsonUserData, true);

if($_SERVER["REQUEST_METHOD"] === "GET"){
    if (isset($userData['email']) && isset($userData['password']) && isset($userData['passwordAgain'])) {
        $email = $userData['email']; 
        $password = $userData['password'];
        $emailExistCheck="select * from felhasznalo where email='$email'";
        $emailExistCheckResult=$conn->query($emailExistCheck);
        if($emailExistCheckResult->num_rows==0){
            echo "<h2 style='color:red'>Ezzel az emailel nem létezik fiók</h2>";
        }
        else{
            $row = $emailExistCheckResult->fetch_assoc();
            $correctPassword=$row['jelszo'];
            $isPasswordMatching=password_verify($password,$correctPassword);
            if($isPasswordMatching==true){
                //sleep(seconds: 0.3);
                $_SESSION['email']=$email;
                header("Location: " . "/1017projekt/views/fooldal.php");
                exit();

            }
            else{
                echo "<h2 style='color:red'>Rossz jelszó</h2>";
            }
        }
    }
}