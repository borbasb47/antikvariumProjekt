function displayUserData() {
    fetch('/1017projekt/api/userData.php')   
        .then(response => response.json())
        .then(adat => {
            console.log(adat.email);
            var userEmailElement = document.getElementById("userEmail");
            userEmailElement.innerHTML+=adat.email;
        });
}
displayUserData();
