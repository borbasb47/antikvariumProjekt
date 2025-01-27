<?php
$jsonUserData = file_get_contents('php://input');

$userData = json_decode($jsonData, true);
