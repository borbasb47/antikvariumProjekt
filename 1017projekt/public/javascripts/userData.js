function displayUserData() {
    fetch('/1017projekt/api/userData.php')   
        .then(response => response.json())
         .then(adat => {
            console.log(adat.email);
            console.log(adat.iranyitoszam);
            console.log(adat.utca);
            console.log(adat.hazszam);
            const userEmailElement = document.getElementById("userEmail");
            const userZipCodeElement = document.getElementById("userZipCode");
            const userStreetElement = document.getElementById("userStreet");
            const userAddressElement = document.getElementById("userAddress");

            const userDataTable=document.getElementById("userDataTable")

            userEmailElement.innerHTML+=" "+adat.email;
            if(adat.iranyitoszam==null&&adat.utca=="none"&&adat.hazszam=="none"){

                const userDataTable=document.getElementById("userDataTable")

                const submitButton=document.createElement("button")
                submitButton.type="submit"
                submitButton.innerHTML="Adatok beküldése"
                userDataTable.appendChild(submitButton)


                userZipCodeElement.innerHTML+="<input type='text' id='userZipCodeInput' placeholder='az irányítószámod'>"
                userStreetElement.innerHTML+="<input type='text' id='userStreetInput' placeholder='az utcád'>"
                userAddressElement.innerHTML+="<input type='text' id='userAddressInput' placeholder='a házszámod'>"

                const userZipCodeInputElement = document.getElementById("userZipCodeInput");
                const userStreetInputElement = document.getElementById("userStreetInput");
                const userAddressInputElement = document.getElementById("userAddressInput");

                submitButton.onclick=function(){
                    const userAddressData={zipCode:userZipCodeInputElement.value,street:userStreetInputElement.value,address:userAddressInputElement.value}
                    const userAddressDataJson=JSON.stringify(userAddressData)
                    fetch('/1017projekt/api/userData.php', {
                        method: 'POST',
                        header: 'Content-Type: application/json',
                        body: userAddressDataJson
                        
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
                        if(adat.refresh){
                            window.location.reload();
                        }
                    })
                    .catch(error => {
                        alert(error.message);
                    })
            
                }
            }
            else{
                userZipCodeLine=document.getElementById("userZipCodeLine")
                userStreetLine=document.getElementById("userStreetLine")
                userAddressLine=document.getElementById("userAddressLine")

                userZipCodeLine.innerHTML+=" "+adat.iranyitoszam
                userStreetLine.innerHTML+=" "+adat.utca
                userAddressLine.innerHTML+=" "+adat.hazszam
            }
        });
}
displayUserData();
