document.addEventListener("DOMContentLoaded", function () {
    var numOfUsers = document.getElementById("numOfUsers");
    function NumOfUsers() {
        fetch('api/cimlapNumOfUsers.php')   
            .then(response => response.json())
            .then(data => {
                console.log(data);
                numOfUsers.innerHTML = "Csatlakozz az oldalunk " + data.count + " felhasználójához";
    });
    }

    NumOfUsers();
});