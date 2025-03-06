<?php 
session_start();

$parsed = parse_url($_SERVER["REQUEST_URI"]); 
$path = $parsed["path"];

require_once("api/connection.php");

switch ($path) {
    case "/1017projekt/views/regisztracio.html":
        require_once("./views/regisztracio.html");
        session_unset();
        break;
    case "/1017projekt/":
        require_once('./views/cimlap.html');
        session_unset();
        break;
    case "/1017projekt/views/fooldal.html":
        require_once('./views/fooldal.html');
        break;
    case "/1017projekt/views/konyv.html":
        require_once('./views/konyv.html');
        break;
    case "/1017projekt/views/felhasznalo.html":
        require_once('./views/felhasznalo.html');
        break;
    default:
        echo "Az oldal nem található, <a href='/1017projekt/'>ugrás a címlapra</a>";
        break;
}