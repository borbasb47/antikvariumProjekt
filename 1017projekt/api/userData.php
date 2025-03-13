<?php
session_start();
require_once("./connection.php");
$email=$_SESSION['email'];

if($_SERVER["REQUEST_METHOD"]==="GET"){
    if(isset($_SESSION['email'])){
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
}

if($_SERVER["REQUEST_METHOD"]==="POST"){

    $jsonUserAddressData = file_get_contents('php://input');
    $userAddressData = json_decode($jsonUserAddressData, true);
    if (isset($userAddressData['zipCode'], $userAddressData['street'], $userAddressData['address'])){
        $zipCode=$userAddressData['zipCode'];
        $street=$userAddressData['street'];
        $address=$userAddressData['address'];
        $insertUserData=$conn->query("update felhasznalo set felhasznalo.iranyitoszam='$zipCode', felhasznalo.utca='$street', felhasznalo.cim='$address' WHERE felhasznalo.email='$email';");
        if($insertUserData){
            echo json_encode(['uzenet' => 'Sikeresen rögzítetted a lakcím adataidat','refresh'=>true]);
        }
        else{
            echo json_encode(['uzenet' => 'Sikertelen lakcím regisztráció','refresh'=>false]);
        }
    }

}
