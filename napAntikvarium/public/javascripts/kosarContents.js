function displayKosarData() {
    fetch('/napAntikvarium/api/kosarContents.php')   
    .then(valasz => {
        if(!valasz.ok)
        {
            throw new Error("hiba lépett fel!")
        }
        return valasz.json();
    })
    .then(adat => {
        if(adat.uzenet){
            alert(adat.uzenet)
        }
        else{
            hely=document.getElementById("kosarItems")
            var osszar = 0
            adat.forEach(kosarElement => {
                const sor = document.createElement('div');
                sor.innerHTML = `
                <div class="kartya">
                    <img src="${kosarElement.kepURL}" alt="" id="termekKep">
                    <h2>${kosarElement.cim}</h2>
                    <p>${kosarElement.alkoto}</p>
                    <p>${kosarElement.mennyiseg} db</p>
                    <p>${kosarElement.ar} Ft/db</p>
                </div>
                `;
                osszar += kosarElement.mennyiseg*kosarElement.ar
                hely.appendChild(sor);

                document.getElementById("osszar").innerHTML = `Összesen: ${osszar} Ft`

                let megrendeles = document.getElementById("megrendeles")
                megrendeles.onclick = function (event) {
                event.preventDefault()
                let tartalom = document.getElementById("tartalom")
                tartalom.innerHTML = `
                    <h2>Köszönjük a rendelésed!</h2>
                    <p>Jelenleg csak utánvétes fizetési mód elérhető. <br>
                        Fizetendő: ${osszar} Ft</p>
                    <p>Szállítási cím: A felhasználói profilban megadott cím</p>
                `
                    fetch('/napAntikvarium/api/emptyKosarContents.php',{
                        method:"DELETE"
                    })   
                    .then(valasz => {
                        if(!valasz.ok)
                        {
                            throw new Error("hiba lépett fel!")
                        }
                        return valasz.json();
                    })

                }
                let empty = document.getElementById("emptyKosar")
                empty.onclick = function (event) {
                    event.preventDefault()
                    fetch('/napAntikvarium/api/emptyKosarContents.php',{
                        method:"DELETE"
                    })   
                    .then(valasz => {
                        if(!valasz.ok)
                        {
                            throw new Error("hiba lépett fel!")
                        }
                        return valasz.json();
                    })
                    window.location.reload();

                }

            });

        }
    })
    .catch(error=>{alert(error.message)})

}
displayKosarData();

