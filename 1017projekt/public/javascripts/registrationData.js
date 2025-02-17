var submitDataRegist=document.getElementById("submitDataRegist")
submitDataRegist.onclick=function(){
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
