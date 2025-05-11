function NumOfUsers() {
    fetch('/napAntikvarium/api/cimlapNumOfUsers.php')   
        .then(response => response.json())
        .then(adat => {
            var numOfUsers = document.getElementById("numOfUsers");
            console.log(adat.count);
            numOfUsers.innerHTML = "Csatlakozz az oldalunk " + adat.count + " felhasználójához";
        });
}
NumOfUsers();
