<?php 
session_start();

$parsed = parse_url($_SERVER["REQUEST_URI"]); 
$path = $parsed["path"];

require_once("api/connection.php");

switch ($path) {
    case "/napAntikvarium/views/regisztracio.html":
        require_once("./views/regisztracio.html");
        session_unset();
        break;
    case "/napAntikvarium/":
        require_once('./views/cimlap.html');
        session_unset();
        break;
    case "/napAntikvarium/views/fooldal.html":
        require_once('./views/fooldal.html');
        break;
    case "/napAntikvarium/views/konyv.html":
        require_once('./views/konyv.html');
        break;
    case "/napAntikvarium/views/felhasznalo.html":
        require_once('./views/felhasznalo.html');
        break;
    case "/napAntikvarium/views/FilmKereso.html":
        require_once("./views/FilmKereso.html");
        break;
    case "/napAntikvarium/views/Konyvkereso.html":
        require_once("./views/Konyvkereso.html");
        break;
    case "/napAntikvarium/views/termek.html":
        require_once("./views/termek.html");
        break;
    case "/napAntikvarium/views/kosar.html":
        require_once('./views/kosar.html');
        break;
    
    default:
        echo "Az oldal nem található, <a href='/napAntikvarium/'>ugrás a címlapra</a>";
        break;
}