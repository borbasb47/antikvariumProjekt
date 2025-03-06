<?php
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    header('Content-Type: application/json');
    echo json_encode(['email' => $email]);
}else {
    header('Content-Type: application/json');
    http_response_code(400); 
    echo json_encode(['error' => 'Email not found in session']);
}
