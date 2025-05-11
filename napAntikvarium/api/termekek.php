<?php

require_once('connection.php');

if($_SERVER["REQUEST_METHOD"] === "GET"){
    
    $query = "SELECT termekek.id, termekek.cim, termekek.alkoto, termekek.megjelenes, termekek.ar, borito.megnevezes AS 'borito', termekek.forgalmazo, termekek.meret, termekek.osszefoglalo, termekek.nyelv, kategoriak.megnevezes AS 'kategoria', termekek.kategoriaID, alkategoriak.megnevezes AS 'alkategoria', tipus.megnevezes AS 'tipus', termekek.hossz, allapot.megnevezes AS 'allapot', termekek.pontok, termekek.kepURL
FROM termekek, borito, kategoriak, alkategoriak, tipus, allapot
WHERE borito.id = termekek.boritoID AND kategoriak.id = termekek.kategoriaID AND alkategoriak.id = termekek.alkategoriaID AND tipus.id = termekek.tipus
AND allapot.id = termekek.allapotID
ORDER BY alkategoriak.id, termekek.cim";

    $result =  mysqli_query($conn, $query);
    $termekek = [];
    
    if($result){
        
        while($row = mysqli_fetch_assoc($result)){
            $termek = [
                'id' => $row['id'],
                'cim' => $row['cim'],
                'alkoto' => $row['alkoto'],
                'megjelenes' => $row['megjelenes'],
                'ar' => $row['ar'],
                'borito' => $row['borito'],
                'forgalmazo' => $row['forgalmazo'],
                'meret' => $row['meret'],
                'nyelv' => $row['nyelv'],
                'osszefoglalo' => $row['osszefoglalo'],
                'kategoriaID' => $row['kategoriaID'],
                'kategoria' => $row['kategoria'],
                'alkategoria' => $row['alkategoria'],
                'tipus' => $row['tipus'],
                'hossz' => $row['hossz'],
                'allapot' => $row['allapot'],
                'pontok' => $row['pontok'],
                'kepURL' => $row['kepURL']
                
            ];

            $termekek[] = $termek;
        }
        header('Content-Type: application/json');
        echo json_encode($termekek);
    }
    else{
        header('Content-Type: application/json');
        echo json_encode(['uzenet' => 'Hiba az adatok lekérdezésében!']);
    }
}