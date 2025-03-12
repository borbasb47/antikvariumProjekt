function displayUserData() {
    fetch('/1017projekt/api/userData.php')   
        .then(response => response.json())
        .then(adat => {
            console.log(adat.email);
            var userEmailElement = document.getElementById("userEmail");
            var userZipCodeElement = document.getElementById("userZipCode");
            var userCityElement = document.getElementById("userCity");
            var userAddressElement = document.getElementById("userAddress");

            userEmailElement.innerHTML+=" "+adat.email;
            if(adat.iranyitoszam==null){
                userZipCodeElement.innerHTML+="<input type='text'>"
            }
            if(adat.utca==null){
                userCityElement.innerHTML+="<input type='text'>"
            }
            if(adat.hazszam==null){
                userAddressElement.innerHTML+="<input type='text'>"
            }
        });
}
displayUserData();
