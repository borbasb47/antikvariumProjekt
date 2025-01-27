<?php
require_once("./connection.php");

if(isset ($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordAgain']) && $hiddenInput=="register"){

    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordAgain=$_POST['passwordAgain'];

    if($password==$passwordAgain){
        $emailExistCheck="select * from felhasznalo where email='$email'";
        $emailExistCheckResult=$conn->query($emailExistCheck);
        if($emailExistCheckResult->num_rows>0){
            echo "<h2 style='color:red'>Ezzel az emailel már regisztráltak</h2>";
        }
        else{
            $hashedPassword=password_hash($password, PASSWORD_DEFAULT);
            $sqlInsertDatas = "INSERT INTO felhasznalo(email, jelszo) VALUES ('$email', '$hashedPassword')";
            if ($conn->query($sqlInsertDatas) === TRUE) {
                echo "<h2 style='color:green'>Sikeres regisztráció!</h2>";
                //$_SESSION['email']=$email;
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            } else {
                echo "Hiba: " . $conn->error;
            }
        }
        
    }
    else{
        echo "<h2 style='color:red'>A két beírt jelszó eltért egymástól</h2>";
    }
}
?>