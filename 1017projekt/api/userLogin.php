<?php
session_start();

require_once("./connection.php");

$jsonUserData = file_get_contents('php://input');

$userData = json_decode($jsonUserData, true);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if (isset($userData['email']) && isset($userData['password'])) {
        $feedback=["uzenet"=>"","redirect"=>false];
        $email = $userData['email']; 
        $password = $userData['password'];
        $emailExistCheck="select * from felhasznalo where email='$email'";
        $emailExistCheckResult=$conn->query($emailExistCheck);
        if($emailExistCheckResult->num_rows==0){
            header("Content-Type: application/json");

            $feedback["uzenet"]="Sikertelen bejelentkezés, hibás e-mail vagy jelszó";
            $feedback["redirect"]=false;

            echo json_encode($feedback);        
        }
        else{
            $row = $emailExistCheckResult->fetch_assoc();
            $correctPassword=$row['jelszo'];
            $isPasswordMatching=password_verify($password,$correctPassword);
            if($isPasswordMatching==true){
                header("Content-Type: application/json");

                $_SESSION['email']=$email;
                
                $feedback["uzenet"]="Sikeres bejelentkezés!";
                $feedback["redirect"]=true;    

                echo json_encode($feedback);

                // $loginAdd=$conn->query("update felhasznalo set felhasznalo.bejelentkezesekSzama=felhasznalo.bejelentkezesekSzama+1 WHERE felhasznalo.email='$email'");
            }
            else{
                header("Content-Type: application/json");

                $feedback["uzenet"]="Sikertelen bejelentkezés, hibás e-mail vagy jelszó";
                $feedback["redirect"]=false;
    
                echo json_encode($feedback);        
    
            }
        }
    }
}