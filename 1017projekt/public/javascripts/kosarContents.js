function displayKosarData() {
    fetch('/1017projekt/api/kosarContents.php')   
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
            adat.forEach(kosarElement => {
                const sor = document.createElement('div');
                sor.innerHTML = `
                <div class="xd">
                    <h2>${kosarElement.cim}</h2>
                    <p>${kosarElement.mennyiseg}</p>
                </div>
                `;

                hely.appendChild(sor);
            });

        }
    })
    .catch(error=>{alert(error.message)})
}
displayKosarData();