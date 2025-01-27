var submitDataRegist=document.getElementById("submitDataRegist")
submitDataRegist.onclick=function(){
    var registEmail=document.forms["registrationForm"]["email"].value
    var registPassword=document.forms["registrationForm"]["password"].value
    var registPasswordAgain=document.forms["registrationForm"]["passwordAgain"].value
    const userData={email:registEmail,password:registPassword,passwordAgain:registPasswordAgain}
    const userJson=JSON.stringify(userData)
    fetch('../api/registUser.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: userJson
    })
}
