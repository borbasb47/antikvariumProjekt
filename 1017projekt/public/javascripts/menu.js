function menu() {
  let x = document.getElementById('menusav');
  x.innerHTML="";
  let elem = document.createElement('div');
  elem.innerHTML = `
    <a href="/1017projekt/views/fooldal.html" class="active">Nap antikvárium</a>
    <a href="/1017projekt/views/Konyvkereso.html">könyvek</a>
    <a href="/1017projekt/views/Filmkereso.html">cd/dvd</a>
    <a href="/1017projekt/views/kapcsolat.html">kapcsolat</a>
    <a href="/1017projekt/views/felhasznalo.html">felhasználó</a>
    <a href="/1017projekt/views/kosar.html">kosár</a>
    <a href="/1017projekt/views/regisztracio.html" id="logOut">kijelentkezés</a>
    <a href="/1017projekt/api/sessionTest.php">sessionTest</a>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  `;
  x.appendChild(elem);
}
menu()


//reszponzív menü
function myFunction() {
    let x = document.getElementById("menusav");
    if (x.className === "menu") {
      x.className += " responsive";
    } else {
      x.className = "menu";
    }
}