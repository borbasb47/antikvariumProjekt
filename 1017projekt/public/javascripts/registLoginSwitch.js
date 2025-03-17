var registerPageTitleText=document.getElementById("registerPageTitleText");
var registrationForm=document.getElementById("registrationForm");
var loginForm=document.getElementById("loginForm");
var regButton=document.getElementById("registrationButton");
var loginButton=document.getElementById("loginButton");
        
regButton.onclick = function(){
    loginForm.style.display="none";
    registrationForm.style.display= "block";
    // registerPageTitleText.innerHTML="Regisztrálás";
    registerPageTitleText.style.color="red";
    document.getElementById("hiddenInputRegistration").value="register";
}

loginButton.onclick = function(){
    registrationForm.style.display= "none";
    loginForm.style.display="block";
    // registerPageTitleText.innerHTML="Bejelentkezés";
    registerPageTitleText.style.color="blue";
    document.getElementById("hiddenInputLogin").value="login";
}