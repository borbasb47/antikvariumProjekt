function kereses(){
    fetch("/napAntikvarium/API/kereso.php")
    .then(adat => adat.json())
    .then(adat => {
        const keres = document.getElementById('kategoriakSelect');
        keres.innerHTML ="";
        adat.forEach(kategoria => {
            if (kategoria.tipus == 2) {
                const opcio = document.createElement('option')
                opcio.innerHTML = `<option value="${kategoria.id}">${kategoria.megnevezes}</option>`;
                keres.appendChild(opcio)
            }
            
        }) 
    })
}

kereses()

function kivalaszt(){
    const hely = document.getElementById("termekek");
    hely.innerHTML = "";
    kat = document.getElementById('kategoriakSelect').selectedIndex + 11
    fetch('/napAntikvarium/API/termekek.php')
    .then(adat => adat.json())
    .then(adat => {
        adat.forEach(termek => {
            if (termek.kategoriaID == kat ) {
                const sor = document.createElement('div');
                sor.innerHTML = `
                <a href="/napAntikvarium/views/termek.html?id=${termek.id}">
                <div class="kartya">
                <img src="${termek.kepURL}" alt="" id="termekKep">
                <h2>${termek.cim}</h2>
                <p>${termek.alkoto}</p>
                <h2>${termek.alkategoria}</h2>
                </div>
                </a>
                `;
                productId=termek.id
                hely.appendChild(sor);
            }
            
        });
    })
}
