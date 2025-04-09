<?php
if($_SERVER["REQUEST_METHOD"]==="GET"){
        $id = $_GET['id'];
        
        require_once('connection.php');
        $query = "SELECT termekek.id, termekek.cim, termekek.alkoto, termekek.megjelenes, termekek.ar, borito.megnevezes AS 'borito', termekek.forgalmazo, termekek.meret, termekek.osszefoglalo, termekek.nyelv, kategoriak.megnevezes AS 'kategoria', termekek.kategoriaID, alkategoriak.megnevezes AS 'alkategoria', tipus.megnevezes AS 'tipus', termekek.hossz, allapot.megnevezes AS 'allapot', termekek.pontok, termekek.kepURL
        FROM termekek, borito, kategoriak, alkategoriak, tipus, allapot
        WHERE borito.id = termekek.boritoID AND kategoriak.id = termekek.kategoriaID AND alkategoriak.id = termekek.alkategoriaID AND tipus.id = termekek.tipus
        AND allapot.id = termekek.allapotID AND termekek.id = '$id'
        ORDER BY alkategoriak.id, termekek.cim";
        
        $result =  $conn->query($query);
        $row = mysqli_fetch_assoc($result);
        //print_r($row);
        if ($row['tipus'] == "könyv") {
            $hossz = $row['hossz']." oldal";
        }
        if ($row['tipus'] == "cd") {
            $hossz = $row['hossz']." perc";
        }
        header("Content-Type: application/json");
        echo json_encode($row);
}
?>