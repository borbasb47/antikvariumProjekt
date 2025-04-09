const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const productId = urlParams.get('id')

function displayBookData(){
   
    fetch(`/1017projekt/api/termek.php?id=${productId}`)   
    .then(response => response.json())
    .then(adat => {
        console.log(adat)
        document.getElementById("cim").innerHTML+=adat.cim
        document.getElementById("leiras").innerHTML+=adat.osszefoglalo
        document.getElementById("szerzo").innerHTML+=adat.alkoto
        document.getElementById("kiado").innerHTML+=adat.forgalmazo
        document.getElementById("megjelenes").innerHTML+=adat.megjelenes
        document.getElementById("allapot").innerHTML+=adat.allapot
        document.getElementById("nyelv").innerHTML+=adat.nyelv
        document.getElementById("hossz").innerHTML+=adat.hossz
        document.getElementById("borito").innerHTML+=adat.borito
        document.getElementById("meret").innerHTML+=adat.meret
        document.getElementById("ar").innerHTML+=adat.ar



        if(adat.tipus=="könyv"){
            document.getElementById("hossz").innerHTML+=" oldal"
        }
        else{
            document.getElementById("hossz").innerHTML+=" perc"
        }


        document.getElementById("productPicture").src=adat.kepURL
        
    })
    .catch(error => console.error('Hiba xd:', error));

}

document.addEventListener('DOMContentLoaded', displayBookData);

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}
  
document.getElementById("kosar").onclick=function(){
    var productAmount=document.getElementById("itemAmount")
    if(productAmount.value==""||isNumeric(productAmount.value)==false){
        alert("A mennyiséget üresen hagytad vagy nem számot adtál meg!")
    }
    else{
        const productData={itemId:productId,itemAmount:productAmount.value}
        console.log(productData)
        const productJson=JSON.stringify(productData)
        fetch('/1017projekt/api/intoKosar.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: productJson
        })
        .then(valasz => {
            if(!valasz.ok)
            {
                throw new Error("hiba lépett fel!")
            }
            return valasz.json();
        })
        .then(adat => {
            alert(adat.uzenet);
        })
        .catch(error => {
            alert(error.message);
        })
    }

}