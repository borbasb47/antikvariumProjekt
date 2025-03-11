<?php
session_start();
require_once("./connection.php");

if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $userData=$conn->query("select felhasznalo.email, felhasznalo.iranyitoszam, felhasznalo.utca, felhasznalo.cim as hazszam, felhasznalo.telefonszam from felhasznalo where felhasznalo.email='$email'");
    if(mysqli_num_rows($userData)==0){
        header('Content-Type: application/json');
        echo json_encode(['uzenet'=>'hiba történt, nem találhatók az emaileddel adatok']);    
    }
    else{
        $userDataAssoc=mysqli_fetch_assoc($userData);
        header('Content-Type: application/json');
        echo json_encode($userDataAssoc);
    }
}else {
    header('Content-Type: application/json');
    http_response_code(400); 
    echo json_encode(['error' => 'nincs ilyen email a sessionben']);
}
