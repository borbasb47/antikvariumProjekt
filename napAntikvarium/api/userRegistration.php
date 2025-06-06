<?php
session_start();

require_once("./connection.php");

$jsonUserData = file_get_contents('php://input');

$userData = json_decode($jsonUserData, true);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if (isset($userData['email']) && isset($userData['password']) && isset($userData['passwordAgain'])) {

        $email = $userData['email']; 
        $password = $userData['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sqlCheckIfRegistered=$conn->query("Select * from felhasznalo where felhasznalo.email='$email'");

        if(mysqli_num_rows($sqlCheckIfRegistered)>0){
            $feedback["uzenet"]="Már regisztráltak ezzel az e-maillel!";
            echo json_encode($feedback);
        }
        else{
            $feedback["uzenet"]=true;
            header("Content-Type: application/json");
            echo json_encode($feedback);
            $sqlInsertDatas = "INSERT INTO felhasznalo(email, jelszo) VALUES ('$email', '$hashedPassword')";
            
            if ($conn->query($sqlInsertDatas) === TRUE) {
                http_response_code(200);
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            } else {
                echo "Hiba: " . $conn->error;
            }
        }
    }
}