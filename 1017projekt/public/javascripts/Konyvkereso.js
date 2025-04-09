function kereses(){
    fetch("/1017projekt/API/kereso.php")
    .then(adat => adat.json())
    .then(adat => {
        const keres = document.getElementById('kategoriakSelect');
        keres.innerHTML ="";
        adat.forEach(kategoria => {
            if (kategoria.tipus == 1) {
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
    kat = document.getElementById('kategoriakSelect').selectedIndex + 1
    fetch('/1017projekt/API/termekek.php')
     .then(adat => adat.json())
    .then(adat => {
        adat.forEach(termek => {
            if (termek.kategoriaID == kat) {
                const sor = document.createElement('div');
                sor.innerHTML = `
                <a href="/1017projekt/views/termek.html?id=${termek.id}">
                    <div class="kartya">
                        <img src="${termek.kepURL}" alt="" id="termekKep">
                        <h2>${termek.cim}</h2>
                        <p>${termek.alkoto}</p>
                        <h2>${termek.alkategoria}</h2>
                    </div>
                </a>
                `;

            hely.appendChild(sor);
            }
            
        });
    })
}