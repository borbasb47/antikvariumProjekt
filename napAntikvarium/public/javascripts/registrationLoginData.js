var registrationForm=document.getElementById("registrationForm")
registrationForm.onsubmit=function(){
    var registEmail=document.forms["registrationForm"]["email"].value
    var registPassword=document.forms["registrationForm"]["password"].value
    var registPasswordAgain=document.forms["registrationForm"]["passwordAgain"].value
    if(registEmail==""||registPassword==""||registPasswordAgain==""){
        alert("Valamelyik mezőt üresen hagytad")
    }
    else if(registPassword!=registPasswordAgain){
        alert("A két beírt jelszó nem egyezik")
    }
    else{
        const userData={email:registEmail,password:registPassword,passwordAgain:registPasswordAgain}
        const userJson=JSON.stringify(userData)
        fetch('/napAntikvarium/api/userRegistration.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: userJson
        })
        .then(valasz => {
            if(!valasz.ok)
            {
                throw new Error("hiba lépett fel!")
            }
            return valasz.json();
        })
        .then(feedback => {
            alert(feedback.uzenet);
        })
        .catch(error => {
            alert("Sikertelen regisztráció!");
        })

    }
}

var loginForm=document.getElementById("loginForm")
loginForm.onsubmit=function(event){
    event.preventDefault();
    var loginEmail=document.forms["loginForm"]["loginEmail"].value
    var loginPassword=document.forms["loginForm"]["loginPassword"].value
    if(loginEmail==""||loginPassword==""){
        alert("Valamelyik mezőt hibásan töltötted ki vagy üresen hagytad")
        return;
    }
    else{
        const userData={email:loginEmail,password:loginPassword}  
        console.log(userData)
        const userJson=JSON.stringify(userData)
        fetch('/napAntikvarium/api/userLogin.php', {
            method: 'POST',
            header: 'Content-Type: application/json',
            body: userJson
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
            if(adat.redirect){
                window.location.href = "/napAntikvarium/views/fooldal.html";
            }
        })
        .catch(error => {
            alert(error.message);
        })

    }
}