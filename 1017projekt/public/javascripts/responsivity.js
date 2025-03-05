
//reszponzív menü
function myFunction() {
    var x = document.getElementById("menusav");
    if (x.className === "menu") {
      x.className += " responsive";
    } else {
      x.className = "menu";
    }
}