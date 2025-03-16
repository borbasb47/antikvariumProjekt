<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termékleírás</title>
    <link rel="stylesheet" href="/1017projekt/public/menu.css">
    <link rel="stylesheet" href="/1017projekt/public/termek.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="menu" id="menusav">

        </div>
    </header>
    <br>
<?php
    $id = $_GET['id'];

    require_once('connection.php');
    $query = "SELECT termekek.id, termekek.cim, termekek.alkoto, termekek.megjelenes, termekek.ar, borito.megnevezes AS 'borito', termekek.forgalmazo, termekek.meret, termekek.osszefoglalo, termekek.nyelv, kategoriak.megnevezes AS 'kategoria', termekek.kategoriaID, alkategoriak.megnevezes AS 'alkategoria', tipus.megnevezes AS 'tipus', termekek.hossz, allapot.megnevezes AS 'allapot', termekek.pontok, termekek.kepURL
    FROM termekek, borito, kategoriak, alkategoriak, tipus, allapot
    WHERE borito.id = termekek.boritoID AND kategoriak.id = termekek.kategoriaID AND alkategoriak.id = termekek.alkategoriaID AND tipus.id = termekek.tipus
    AND allapot.id = termekek.allapotID AND termekek.id = '$id'
    ORDER BY alkategoriak.id, termekek.cim";
    
    $result =  mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    //print_r($row);
    if ($row['tipus'] == "könyv") {
        $hossz = $row['hossz']." oldal";
    }
    if ($row['tipus'] == "cd") {
        $hossz = $row['hossz']." perc";
    }

echo '
    <h2 id="cim">'.$row['cim'].'</h2>
    <div id="content">
        
        <div id="kep">
            <img src="'.$row['kepURL'].'" alt="Könyv címe"> <br>
            <button id="kosar">Kosárba</button>
            <h3>Leírás:</h3>
            <p id="leiras">'.$row['osszefoglalo'].'
            </p>
        </div>
        
        <section id="book-details">
            
            <p id="szerzo"><strong>Szerző: </strong> '.$row['alkoto'].'</p> <hr>
            <p id="kiado"><strong>Kiadó: </strong> '.$row['forgalmazo'].'</p> <hr>
            <p id="megjelenes"><strong>Kiadás éve:</strong> '.$row['megjelenes'].'</p> <hr>
            <p id="allapot"><strong>Állapot:</strong> '.$row['allapot'].'</p> <hr>
            <p id="nyelv"><strong>Nyelv:</strong> '.$row['nyelv'].'</p> <hr>
            <p id="hossz"><strong>Hossz:</strong> '.$hossz.'</p> <hr>
            <p id="borito"><strong>Borító:</strong> '.$row['borito'].'</p> <hr>
            <p id="meret"><strong>Méret:</strong> '.$row['meret'].'</p> <hr>
            <p id="ar"><strong>Ár:</strong> '.$row['ar'].' Ft</p> <hr>
        </section>
    </div>
'

    
?>


    <script src="/1017projekt/public/javascripts/menu.js"></script>
    <script src="/1017projekt/public/javascripts/Konyvkereso.js"></script>
    <script src="/1017projekt/public/javascripts/Filmkereso.js"></script>
</body>
</html>

