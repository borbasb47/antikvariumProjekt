var registrationForm=document.getElementById("registrationForm")
registrationForm.onsubmit=function(){
    var registEmail=document.forms["registrationForm"]["email"].value
    var registPassword=document.forms["registrationForm"]["password"].value
    var registPasswordAgain=document.forms["registrationForm"]["passwordAgain"].value
    if(registEmail==""||registPassword==""||registPasswordAgain==""||registPassword!=registPasswordAgain){
        alert("Valamelyik mezőt hibásan töltötted ki vagy üresen hagytad")
    }
    else{
        const userData={email:registEmail,password:registPassword,passwordAgain:registPasswordAgain}
        const userJson=JSON.stringify(userData)
        fetch('/1017projekt/api/userRegistration.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: userJson
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
        fetch('/1017projekt/api/userLogin.php', {
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
                window.location.href = "/1017projekt/views/fooldal.html";
            }
        })
        .catch(error => {
            alert(error.message);
        })

    }
}