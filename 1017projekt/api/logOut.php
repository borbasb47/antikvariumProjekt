<?php

$jsonSessionClear=file_get_contents('php://input');

$sessionClear = json_decode($jsonSessionClear, true);

if($sessionClear['shouldSessionClear']=="Yes"){
    header("Content-Type: application/json");
    echo json_encode(['uzenet' => 'Sikeres kijelentkezés']);        
    session_unset();

}